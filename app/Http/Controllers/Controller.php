<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function configureStep(){
        $data = request()->except('model');
        $model = request()->input('model');
        $objet = $model::find($data['id']);
        if($objet->update($data)){
            return $data;
        }
        return response()->json(['error'=>'Error on request']);
    }
}
