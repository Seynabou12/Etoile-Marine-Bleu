<?php

namespace App\Models;

use App\Scopes\FaculteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function facultes()
    {
        return $this->hasMany(Faculte::class);
    }
    public function transferts()
    {
        return $this->hasMany(Transfert::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function daj()
    {
        return $this->belongsTo(Daj::class);
    }
    public function prefecture()
    {
        return $this->belongsTo(Daj::class);
    }

}
