<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        
        // $formations = Formation::factory()->get();
        $formations = Formation::actif()->get();
        return view('admin.formations.index',compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        // $formation = new Formation();
        // return view('admin.formations.create', compact('formation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationRequest $request)
    {

        $data = request()->all();
        $formation = new Formation();
        return $formation->create($data)
        ? redirect()->back()->withSuccess("L'opération a été effectuée avec succès !")
        : redirect()->back()->withErrors("L'opération a échoué !");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $formation = Formation::find($id);
        $newFormation = new Formation();
        return view('admin.formations.modal',compact('formation','newFormation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $formation = Formation::find($id);
        return $formation->update(request()->all())
        ? redirect()->back()->withSuccess("L'opération a été effectuée avec succés !")
        : redirect()->back()->withErrors("L'opération a échoué !");

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $formations = Formation::find($id);
        $formations->status = 0; 
        return $formations->save()
        ? redirect()->back()->withSuccess("Save operation completed successfully!")
        : redirect()->back()->withErrors("Save operation failed !");

    }
}
