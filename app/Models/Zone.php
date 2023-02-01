<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contribuables()
    {
        return $this->hasMany(Contribuable::class);
    }
    public function recouvrements()
    {
        return $this->hasManyThrough(Recouvrement::class, Contribuable::class,
                    'zone_id', // Foreign key on the environments table...
                    'contribuable_id', // Foreign key on the deployments table...
                    'id', // Local key on the projects table...
                    'id' // Local key on the environments table...
                )
                // ->where('soldes.status',1)
                ;
    }
}
