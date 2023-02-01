<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'studies' => AsArrayObject::class,
        'interests' => AsArrayObject::class,
        'choices' => AsArrayObject::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
    public function personnalite()
    {
        return $this->belongsTo(Personnalite::class, 'personality_id');
    }
    public function getNomCompletAttribute() {
        return $this->prenom .' ' . $this->nom;
    }

    public function getEtudesAttribute(){
        $datas = Etude::actif()->get();
        return self::getDatas($datas,$this->studies);
    }

    public function getInteretsAttribute(){
        $datas = CentreInteret::actif()->get();
        return self::getDatas($datas,$this->interests);
    }
    public function getListOfChoicesAttribute(){
        if($this->choices == null) return [];
        $choices = $this->choices->toArray();
        $tabs = [];
        for ($i=1; $i <= count($choices) ; $i++) {
            # code...
            if(isset($choices[$i]["department_id"])){

                $dept =  (int) $choices[$i]["department_id"];
                $departement = Departement::with('faculte')->where('id',$dept)->first();
                $dept_name = $departement->faculte->name??'';
                $tabs [] = [$choices[$i]['date']??'', $dept_name.' '.$departement->name,$departement->universite_id];
            }
        }
       return $tabs;
    }

    public function studentOfStuversite(){

    }

    public function getViewStudiesAttribute(){
        $datas = self::getEtudesAttribute();
        return self::getView($datas);

    }
    public function getViewInterestAttribute(){
        $datas = self::getInteretsAttribute();
        return self::getView($datas);

    }
    public function getViewChoicesAttribute(){
        $datas = self::getListOfChoicesAttribute();
        $view = '';
        for ($i=0; $i < count($datas) ; $i++) {
            # code...
            if($i==0) $view.=$datas[$i][0].' | '.$datas[$i][1];
            else $view.= ' '.$datas[$i][0].' | '.$datas[$i][1];
        }

        return $view;

    }
    public function getAgeAttribute(){
        $birthDate = $this->date_naissance;
        return Carbon::parse($birthDate)->age;
    }
    public function getDatas($datas,$asArray){
        if($asArray == null) return [];
        $array  = [];
        foreach ($datas as $key => $data) {
            # code...
            if(in_array($data->id,$asArray->toArray())){
                array_push($array,$data->name);
            }
        }

        return $array;
    }

    public function getView($datas){
        $view = '';
        foreach ($datas as $key => $value) {
            if($key == 0) $view.=$value;
            if(count($datas) - $key == 1) $view.=$value;
            else $view.=$value.' | ';
        }

        return $view;
    }

    public function getSexeNameAttribute(){

        if($this->sexe == 0) return 'Male';
        return 'Female';
    }

    public function getSelectedStudiesAttribute(){
        if($this->studies == null) return [];
        $studies = [];
        foreach($this->studies as $study){
            $studies[] = Etude::find($study);
        }
        return $studies;
    }

    public function getSelectedInterestsAttribute(){
        if($this->interests == null) return [];

        $interests = [];
        foreach($this->interests as $interest){
            $interests[] = CentreInteret::find($interest);
        }
        return $interests;
    }

    public function getSelectedDepartmentsAttribute(){
        $departments = [];
        for($i=1;$i<=3;$i++){
            if(isset($this->choices[$i]['department_id'])){
                $departments[] = Departement::find($this->choices[$i]['department_id']);
            }
        }
        return $departments;
    }

    public static function filtreEleve($year,$id){
        $students = Eleve::all();
        $eleves = [];
        $verification = [];
        foreach ($students as $key => $student) {
            if($year == (int)$student->anne_diplome){
                $choices = $student->choices;
                if($student->choices !== null){
                    for ($i=1; $i < count($choices) ; $i++) {
                        if(!in_array($student->id,$verification)){
                            if($choices[$i]['university_id'] == $id){
                                $eleves[] = $student;
                                $verification[] = $student->id;
                            }

                        }
                    }
                }
            }
        }

        return $eleves;
    }
}
