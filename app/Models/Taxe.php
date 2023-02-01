<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Taxe extends Pivot
{
    use HasFactory;
    protected $guarded = ['*'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function price()
    {
        return $this->belongsTo(User::class);
    }
}
