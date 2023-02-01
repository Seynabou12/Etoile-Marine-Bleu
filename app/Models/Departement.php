<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Departement extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'studies' => AsArrayObject::class,
        'interests' => AsArrayObject::class,
        'personalities' => AsArrayObject::class,
    ];

    public function ScopeActif($q){
        return $q->where('status',1);
    }
    public function ScopeIsOwner($q){
        $user = Auth::user();
        if(!$user->is_admin){
            return $q->where('status',1)->where('universite_id',$user->universite->id);
        }
    }
    public function ScopeInActif($q){
        return $q->where('status',0);
    }
    public function faculte()
    {
        return $this->belongsTo(Faculte::class,'faculte_id');
    }

}
