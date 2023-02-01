<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use XMLParser;

class Entreprise extends Model
{
    use HasFactory;

    protected   $guarded = ['id'];
    protected   $_timeout = 90;

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

}
