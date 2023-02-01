<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuable extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contribuable()
    {
        return $this->belongsTo(Contribuable::class);
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
    public function recouvrements()
    {
        return $this->hasMany(Recouvrement::class);
    }
}
