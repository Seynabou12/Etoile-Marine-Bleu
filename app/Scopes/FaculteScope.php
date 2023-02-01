<?php

namespace App\Scopes;

use App\Models\Universite;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class FaculteScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if(Auth::check() && !$user->is_admin) {
            if(isset($user->universite)){

                $universite = $user->universite;
                $builder->where('universite_id', $universite->id);
            }

            return true;
        }
    }
}
