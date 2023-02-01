<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ScopeActif($q){
        return $q->where('status',1);
    }
    public function ScopeInActif($q){
        return $q->where('status',1);
    }

    public function getEtatAttribute() {
        $class = $this->status == 1 ? "badge badge-success" : "badge badge-warning";
        $name = $this->status == 1 ? "actif" : "inactif";
        return '<span class="'.$class.'">'.$name.'</span>';
    }
}
