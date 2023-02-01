<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    public function insformations()
    {
        return $this->hasMany(InsFormation::class);
    }
 
    public function getSessionAttribute(){
        $list = [0=>'Autumn',1=>'Winter'];
        return $list[$this->attributes['session']]??'';
    }

    public function ScopeActif($q){

        return $q->where('status',1);
    }
    
    public function getEtatAttribute() {
        $class = $this->status == 1 ? "badge badge-success" : "badge badge-warning";
        $name = $this->status == 1 ? "actif" : "inactif";
        return '<span class="'.$class.'">'.$name.'</span>';
    }

    public function sessions()
    {
        return $this->hasMany(Session::class)->actif();
    }
}
