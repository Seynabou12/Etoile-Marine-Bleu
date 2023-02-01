<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ScopeActif($q){
        return $q->where('status',1);
    }
    public function ScopeInActif($q){
        return $q->where('status',0);
    }
}
