<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntreprisesController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::orderByDesc("created_at")->get()->all();
        return view("admin.entreprises.index", compact('entreprises'));
    }


    public function show(Entreprise $entreprise)
    {
        $users = $entreprise->users ?? [];
        return view("admin.entreprises.show", compact("entreprise", "users"));
    }

    public function store(Request $request)
    {
        //
        $data = request()->all();
        $entreprise = new Entreprise();
        return $entreprise->create($data)
        ? redirect()->back()->withSuccess("Save operation completed successfully!")
        : redirect()->back()->withErrors("Save operation failed !");
    }
}
