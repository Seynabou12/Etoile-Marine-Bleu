<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }

    // crée le fichier à partir du tableau de données de l’élément.
    static function create($itemTab, $archiveId){

    }

}
