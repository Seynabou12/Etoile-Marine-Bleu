<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class UtilitiesController extends Controller
{

    static function uploadFile($fichier, $dossier, $nom = null){
        if($nom == null) $nom = "nodefini";
        $date = Carbon::now();
        $date = $date->toDateString();
        $file_name = $fichier['name'];
        $file_tmp = $fichier['tmp_name'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if(!in_array($ext,['csv','xlsx','xls'])) return false;
        $target_dir = public_path('images/'.$dossier);
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $token = self::_token(4);
        $newFileName =  $nom."-". $date. '.' . $ext;
        if(isset($nom)) $newFileName =  $nom.$token."-". $date. '.' . $ext;
        $desti_file = $target_dir . '/' . $newFileName;
        move_uploaded_file($file_tmp, $desti_file);

        return "images/".$dossier."/".$newFileName;
    }
    public static function _token(int $taille){
        $length = $taille;
        // debug($length);
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $taillechar = strlen($char);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $char[rand(0, $taillechar - 1)];
        }
        return $randomString;
    }

    public static function explodeArray($datas){
        $array  ='';
        for ($i=0; $i < count($datas) ; $i++) {
            # code...
            if ($i == 0) $array = $datas[$i];
            else $array .=';'.$datas[$i];
        }

        return $array;
    }
    public static function showExplode($op,$attribute){
        $attr = explode($op,$attribute);
        if(empty($attr[count($attr) - 1])){
            unset($attr[count($attr) - 1]);
        }
        return $attr;
    }

}
