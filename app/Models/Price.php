<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $guarded = ["*"];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'taxes', 'price_id', 'type_id')->withPivot('name');
        // ->withPivot('active', 'created_by');->wherePivot('approved', 1);
        // foreach ($user->roles as $role) {
        //     echo $role->pivot->created_at;
        // }
    }

    public function getFormatMontantAttribute(){
        return number_format($this->montant,0,'','.')??'';
    }
}
