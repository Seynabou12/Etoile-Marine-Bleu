<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected   $guarded = ['id'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function insformations()
    {
        return $this->hasMany(InsFormation::class);
    }
    
    public function getEtatAttribute() {
        $class = $this->status == 1 ? "badge badge-success" : "badge badge-warning";
        $name = $this->status == 1 ? "actif" : "inactif";
        return '<span class="'.$class.'">'.$name.'</span>';
    }

    public function ScopeActif($q){

        return $q->where('status',1);
    }
}
