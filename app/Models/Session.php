<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected   $_timeout = 90;

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function ScopeActif($q){

        return $q->where('status',1);
    }

}
