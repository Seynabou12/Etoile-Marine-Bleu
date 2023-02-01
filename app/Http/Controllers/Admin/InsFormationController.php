<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\InsFormation;
use Illuminate\Http\Request;

class InsFormationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insformation = InsFormation::actif()->get();
        $formations = Formation::all();
        $candidats = Candidat::all();
        return view('admin.insformations.index',compact('insformation','formations','candidats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->all();
        $insformation = new InsFormation();
        if(isset($data['formation_name'])){
            $formation = new Formation();
            $formation->name = $data['formation_name'];
            $formation->save();
            $data['formation_id'] = $formation->id;
            unset($data['formation_name']);
        }

        return $insformation->create($data)
        ? redirect()->back()->withSuccess("Save operation completed successfully!")
        : redirect()->back()->withErrors("Save operation failed !");
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
        //
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
        
        $insformation = InsFormation::find($id);
        $data = request()->all();
        return $insformation->update($data)
        ? redirect()->back()->withSuccess("Save operation completed successfully!")
        : redirect()->back()->withErrors("Save operation failed !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $insformation = InsFormation::findOrFail($id);
        $insformation->status = 0; //Supprimer
        return $insformation->save()
        ? redirect()->back()->withSuccess("Save operation completed successfully!")
        : redirect()->back()->withErrors("Save operation failed !");

    }
}
