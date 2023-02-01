<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Models\Formation;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function index()
    {

        // $sessions = Session::all();
        $sessions = Session::actif()->get();
        $formations = Formation::all();
        return view("admin.sessions.index", compact('sessions','formations'));
    }

    public function store(Request $request)
    {

        $data = request()->all();
        $session = new Session();
        if(isset($data['formation_name'])){
            $formation = new Formation();
            $formation->name = $data['formation_name'];
            $formation->save();
            $data['formation_id'] = $formation->id;
            unset($data['formation_name']);
        }
        return $session->create($data)
            ? redirect()->back()->withSuccess("L'opération a été effectuée avec succès !")
            : redirect()->back()->withErrors("L'opération a échoué !");
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $session = Session::find($id);
        return $session->update(request()->all())
            ? redirect()->back()->withSuccess("L'opération a été effectuée avec succés !")
            : redirect()->back()->withErrors("L'opération a échoué !");
    }

    public function destroy($id)
    {

        $session = Session::findOrFail($id);
        $session->status = 0;
        return $session->save()
            ? redirect()->back()->withSuccess("Save operation completed successfully!")
            : redirect()->back()->withErrors("Save operation failed !");
    }
}
