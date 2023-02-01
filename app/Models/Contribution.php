<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inscription()
    {
        return $this->hasOne(Inscription::class);
    }
}
