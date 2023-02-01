<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function taxes()
    {
        return $this->hasMany(Taxe::class);
    }
}
