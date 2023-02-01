<?php

namespace App\Models;

use App\Scopes\ArchiveScope;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ZipArchive;

class Archive extends Model
{
    static $dossier_temp = 'Archives-temp/';
    use HasFactory;
    protected $guarded = ['id'];
    static $somme = 0;

    protected static function boot()
    {
        parent::boot();
        return static::addGlobalScope(new ArchiveScope);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function ScopeArchivesByYear($q){
        $groupBy = ['natureOperation',DB::raw("DATE_FORMAT(dateDossier,'%Y')"),'entreprise_id'];
        return  $q->groupBy($groupBy)
                    ->selectRaw('count(*) as nombre')
                    ->selectRaw('entreprise_id')
                    ->selectRaw('natureOperation')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%Y') as year"))
                    // ->selectRaw('sum(nombreDocuments) as nombre')
                    ->selectRaw('sum(valeurTotaleCfa) as somme')
                    ->orderBy('year','DESC');
    }

    public function ScopeArchivesByProvenanceByYear($q){
        $groupBy = ['provenance','entreprise_id',DB::raw("DATE_FORMAT(dateDossier,'%Y')")];
        return  $q->groupBy($groupBy)
                    ->selectRaw('count(*) as nombre')
                    ->selectRaw('entreprise_id')
                    ->selectRaw('provenance')
                    ->selectRaw('natureOperation')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%Y') as year"))
                    // ->selectRaw('sum(nombreDocuments) as nombre')
                    ->selectRaw('sum(valeurTotaleCfa) as somme')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%m') as month"))
                    ->orderBy('year','DESC')
                    ->orderBy('provenance','DESC')
                    ->where('natureOperation','import');

    }
    public function ScopeArchivesByMonth($q){
        $groupBy = ['natureOperation',DB::raw("DATE_FORMAT(dateDossier,'%m')"),DB::raw("DATE_FORMAT(dateDossier,'%Y')"),'entreprise_id'];
        return  $q->groupBy($groupBy)
                    ->selectRaw('count(*) as nombre')
                    ->selectRaw('entreprise_id')
                    ->selectRaw('natureOperation')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%Y') as year"))
                    // ->selectRaw('sum(nombreDocuments) as nombre')
                    ->selectRaw('sum(valeurTotaleCfa) as somme')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%m') as month"))
                    ->orderBy('year','DESC')
                    ->orderBy('month');

    }

    public function ScopeArchivesByDestination($q){
        $groupBy = ['destination','natureOperation','entreprise_id'];
        return  $q->groupBy($groupBy)
                    ->selectRaw('count(*) as nombre')
                    ->selectRaw('entreprise_id')
                    ->selectRaw('destination')
                    ->selectRaw('natureOperation')
                    // ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%Y') as year"))
                    // ->selectRaw('sum(nombreDocuments) as nombre')
                    ->selectRaw('sum(valeurTotaleCfa) as somme')
                    ->where('natureOperation','export')
                    // ->orderBy('year','DESC')
                    ->orderBy('destination');
    }

    public function ScopeArchivesByProvenance($q){
        $groupBy = ['provenance','natureOperation','entreprise_id'];
        return  $q->groupBy($groupBy)
                    ->selectRaw('count(*) as nombre')
                    ->selectRaw('entreprise_id')
                    ->selectRaw('provenance')
                    ->selectRaw('natureOperation')
                    // ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%Y') as year"))
                    // ->selectRaw('sum(nombreDocuments) as nombre')
                    ->selectRaw('sum(valeurTotaleCfa) as somme')
                    ->where('natureOperation','import')
                    // ->orderBy('year','DESC')
                    // ->orderBy('month')
                    ->orderBy('provenance','ASC');

    }
    public function ScopeArchivesByProvenanceMonth($q,$param){
        $groupBy = ['natureOperation','provenance',DB::raw("DATE_FORMAT(dateDossier,'%Y')"),DB::raw("DATE_FORMAT(dateDossier,'%m')"),'entreprise_id'];
        return  $q->groupBy($groupBy)
                    ->selectRaw('count(*) as nombre')
                    ->selectRaw('entreprise_id')
                    ->selectRaw('provenance')
                    ->selectRaw('natureOperation')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%Y') as year"))
                    ->selectRaw('sum(nombreDocuments) as nombre')
                    // ->selectRaw('sum(valeurTotaleCfa) as somme')
                    ->selectRaw(DB::raw("DATE_FORMAT(dateDossier,'%m') as month"))
                    ->orderBy('year','DESC')
                    ->orderBy('month')
                    ->orderBy('provenance')
                    ->where('provenance',$param);

    }

    public function getZipNameAttribute(){
        $name = explode('.',$this->name);

        return $name[0];
    }
    public function getdateAttribute(){
        $date = Carbon::create($this->dateDossier);

        return $date->locale('fr')->isoFormat('D MMMM Y');
    }
    public function getMoisAttribute(){
        $date = Carbon::create($this->dateDossier);

        return $date->format('m');
    }
    public function getAnneeAttribute(){
        $date = Carbon::create($this->dateDossier);

        return $date->format('Y');
    }

    public function fichiers()
    {
        return $this->hasMany(Fichier::class);
    }

    // : retourne les archives présentes dans le dossier ftp, ne conserver que le name, qui nous sert d’identifiant.
    static function ftpArchivesList($ftpConnexion){
        $datas = ftp_nlist($ftpConnexion, '/.');
        if($datas){
            $datas = array_filter($datas, function($item){
                $data = explode('.', $item['name']);
                if(isset($data[1]) && $data[1] == 'zip') return true;
                return false;
            });

            $dossiers = array_map(function($item){
                return $item['name'];
            },$datas);

            return $dossiers;
        }
        return false;
    }

    // Charger les zip depuis un répertoire local
    static function UploadFromLocal($entreprise_id){
        $entreprise = Entreprise::findOrFail($entreprise_id);
        //Scanner les fichiers du répertoire temp;
        $allFiles = scandir(self::$dossier_temp);
        $files = array_diff($allFiles, array('.', '..'));
        $reponse = true;
        $ctpNewArchive = 0;
        $ctpErrorArchive = 0;
        foreach($files as $file){
            if(Archive::isNew($file)){
                $reponse = self::create('local', $entreprise_id, $file);
                if($reponse) $ctpNewArchive ++;
                else $ctpErrorArchive ++;
            }
        }
        $reponse = ['success'=>$ctpNewArchive,'error'=>$ctpNewArchive];
        return $reponse;
    }

    // Telecharge les zip
    static function ftpArchivesUpdate($entreprise_id){
        $entreprise = Entreprise::findOrFail($entreprise_id);
        $ftpConnexion = $entreprise->ftpConnect2();
        if($ftpConnexion){
            $listeArchives = self::ftpArchivesList($ftpConnexion);
            if(!$listeArchives) return false;
            $reponse = true;
            $ctpNewArchive = 0;
            $ctpErrorArchive = 0;

            foreach ($listeArchives as  $archive) {
                # code...
                if(Archive::isNew($archive)){
                    $reponse = self::create($ftpConnexion, $entreprise_id, $archive);
                    if($reponse) $ctpNewArchive ++;
                    else $ctpErrorArchive ++;
                }
            }

            ftp_close($ftpConnexion);// Fermeture de la connexion
            $reponse = ['success'=>$ctpNewArchive,'error'=>$ctpNewArchive];
            // if($ctpNewArchive == 0) return false;
            return $reponse;
        }

        return false;
    }


    //true si l’archive n’est pas présente dans notre base
    static function isNew($ArchiveName) {

        $archive = Archive::where('name',$ArchiveName)->first();
        return !isset($archive);
    }
    // Récupère l’enveloppe contenu dans l’archive et transforme cela en tableau de données.
    static function scanEnveloppe($entreprise_id,$dossierName)
    {
        $file = "Archives".DIRECTORY_SEPARATOR."Entreprise-".$entreprise_id.DIRECTORY_SEPARATOR.$dossierName.DIRECTORY_SEPARATOR."envelope.xml";
        $data = self::readFile($file);
        return $data;
    }

    //Enregistrement de l'archive et des fichiers
    public function saveArchiveFiles($archive, $ArchiveName, $entreprise_id){

        $files = $archive['items']['rootEnvelopeItem'];
        unset($archive['items']);
        $archive = self::itemsToString($archive);
        $archive['name'] = $ArchiveName;
        $archive['entreprise_id'] = $entreprise_id;
        $archive['valeurTotaleDevise'] = isset($archive['valeurTotaleDevise'])?(int)$archive['valeurTotaleDevise']:0;
        $archive['valeurTotaleCfa']    = isset($archive['valeurTotaleCfa'])?(int)$archive['valeurTotaleCfa']:0;
        if(isset($archive['dateDossier'])){
            $date = date_parse_from_format('j.n.Y H:iP',$archive['dateDossier']);
            $archive['dateDossier'] = Carbon::create($date['year'], $date['month'], $date['day'], $date['minute'], $date['second'], 0);
        }
        $newArchive = new Archive($archive);
        if($newArchive->save()){
            foreach ($files as $key => $file) {
                $files[$key] = self::itemsToString($file);
                $files[$key]['archive_id'] = $newArchive->id;
            }
            Fichier::insert($files);
            return true;
        }

        return false;

    }
    //
    static function itemsToString($items){
        if (is_array($items) || is_object($items)){

            foreach ($items as $key => $item) {
                # code...
                if(gettype($item) == 'array'){
                    $items[$key] = null;
                }
            }
            return  $items;
        }

    }

    // Lecture fichier xml
    static function readFile($file){
        $xmlString = file_get_contents(public_path($file));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        return $phpArray;
    }

    // A partir du tableau de données, faire la création de l’archive et créer les fichiers via la fonction du modèle « fichier ».
    // il faudra vérifier si l’archive existe avant de la créer.
    // Si forcer=1, même si l’archive existe, elle doit être supprimée et recréée.
    static function create($connexion, $entreprise_id, $ArchiveName, $forcer=0) {

        try {
            //code...
            $temp_archive = self::$dossier_temp.$ArchiveName;
            if($connexion == 'local' or ftp_get($connexion, $temp_archive, $ArchiveName, FTP_BINARY)){ // Telechargement
                $dossierName = explode('.zip',$ArchiveName);
                $dossierName = $dossierName[0];
                self::archiveTransfert($ArchiveName, $entreprise_id,$dossierName); // unzip
                $data = self::scanEnveloppe($entreprise_id,$dossierName); //Scan
                self::saveArchiveFiles($data, $ArchiveName, $entreprise_id); // Enregistremen BDD
                unlink(public_path($temp_archive)); //suppression de l'archive zip
            }

            return true;

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        return false;
    }

    //  vérifie si l’archive est conforme à l’enveloppe qui se trouve sur le serveur FTP.
    //  prévoir un attribut conforme qui s’initialise à 1, dans la table archive.
    static function isArchiveCompliant(){

    }

    //pour une mise à jour de l’archive.
    function ftpUpdate() {

    }

    //pour une mise à jour de l’ensemble des archives.
    function ftpUpdateAll(){

    }

    // ARchive transfert

    static function archiveTransfert($ArchiveName, $entreprise_id,$dossierName){
        $chemin = 'Archives/Entreprise-'.$entreprise_id.'/'.$dossierName;
        if (!file_exists($chemin)) {
            mkdir($chemin, 0777, true);
        }
        $zip = new ZipArchive();
        $res = $zip->open(self::$dossier_temp.$ArchiveName);
        if ($res === TRUE) {
            $zip->extractTo($chemin);
            $zip->close();
            return true;
        }

        return false;
    }

    static function uploadArchiveLocal($file, $tmp_name, $entreprise_id, $dossierName){

        $ArchiveName =  $file->getClientOriginalName();
        $temp_archive = self::$dossier_temp.'/'.$ArchiveName;
        // $tmp_name = $_FILES['file']['tmp_name'];
        try {
            //code...
            if(move_uploaded_file($tmp_name, $temp_archive)){

                self::archiveTransfert($ArchiveName, $entreprise_id,$dossierName); // unzip
                $data = self::scanEnveloppe($entreprise_id,$dossierName); //Scan
                $reponse = self::saveArchiveFiles($data, $ArchiveName, $entreprise_id); // Enregistremen BDD

                unlink(public_path($temp_archive)); //suppression de l'archive zip
                return true;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

        return false;
    }

    static function uploadArchiveServer($entreprise_id,$file, $fileFrom, $fileTo, $mode=null)
    {
        $entreprise = Entreprise::findOrFail($entreprise_id);
        $ftpConnexion = $entreprise->ftpConnect();
        if($ftpConnexion){

            try {
                if(ftp_put($ftpConnexion, $fileTo, $fileFrom, FTP_BINARY))
                    return true;
            } catch(\Exception $e) {
                return false;
            }
        }
        return false;
    }


    public static function filter($data,$filtres,$req=0){
        foreach($filtres as $filtre){
            if($req) self::filterOneReq($data, $filtre);
            else $data = self::filterOne($data, $filtre);
        }
        return $data;
    }

    public static function filterOne($data,$filtre){
        if(!isset($filtre)) return $data;

        return $data->filter(function ($item) use ($filtre){
            if(isset($filtre['op'])){
                $param = array_keys($filtre)[0];
                $value = $filtre[$param];
                if($value){
                    if($filtre['op'] == '<=') return $item->$param <= $value;
                    elseif($filtre['op'] == '>=') return $item->$param >= $value;
                    elseif($filtre['op'] == '%') return Str::contains($value, $item->$param);
                    return true;
                } return true;
            }
            $param = key($filtre);
            $value = $filtre[$param];
            if($value) return $item->$param == $value;
            return true;
        });
    }

    public static function filterOneReq($data,$filtre){
        if(!isset($filtre)) return $data;
        if(isset($filtre['op'])){
            $param = array_keys($filtre)[0];
            $value = $filtre[$param];
            if($value){
                if($filtre['op'] == '%') return $data->where($param,'like','%'.$value.'%');
                else return $data->where($param,$filtre['op'],$value);
            } return $data;
        }
        $param = key($filtre);
        $value = $filtre[$param];
        if($value) return $data->where($param,$value);
        return $data;
    }

    static function listePays(){
        $provenances = Archive::where('natureOperation','Import')->pluck('provenance')->unique()->sort()->toArray();
        $destinations = Archive::where('natureOperation','Export')->pluck('destination')->unique()->sort()->toArray();
        $pays = array_unique(array_merge($provenances,$destinations));
        if (($key = array_search("Sénégal", $pays)) !== false) {
            unset($pays[$key]);
        }
        sort($pays);
        return $pays;
    }
}
