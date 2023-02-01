<?php

namespace App\Models;

use App\Scopes\FaculteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Faculte extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected static function boot()
    // {
    //     parent::boot();
    //     return static::addGlobalScope(new FaculteScope);
    // }
    public function ScopeActif($q){
        return $q->where('status',1);
    }
    public function ScopeIsOwner($q){
        $user = Auth::user();
        if(!$user->is_admin){
            return $q->where('status',1)->where('universite_id',$user->universite->id);
        }
    }
    public function universite()
    {
        return $this->belongsTo(Universite::class,'universite_id');
    }
    public function departements()
    {
        return $this->hasMany(Departement::class);
    }
    public function ScopeInActif($q){
        return $q->where('status',0);
    }

    public function getNameDepartementAttribute(){

        $depts = $this->departements()->get();
        $view = '';
        foreach ($depts as $key => $dept) {
            # code...
            $view.='<span class="badge badge-primary rounded mr-2 mb-1">'.$dept->name.'</span>';
        }
        return $view;
    }
    public function getDepartementAttribute(){

        $depts = $this->departements()->get();
        $view = '';
        foreach ($depts as $key => $dept) {
            # code...
            $view.='<span class="tag label label-info">'.$dept->name.'</span>';
        }
        return $view;
    }
}
