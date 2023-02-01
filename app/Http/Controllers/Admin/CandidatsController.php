<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class CandidatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $candidats = Candidat::actif()->get();
        $entreprises = Entreprise::all();
        return view('admin.candidats.index',compact('candidats','entreprises'));
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
        //
        $data = request()->all();
        $candidat = new Candidat();
        if(isset($data['entreprise_name'])){
            $entreprise = new Entreprise();
            $entreprise->name = $data['entreprise_name'];
            $entreprise->save();
            $data['entreprise_id'] = $entreprise->id;
            unset($data['entreprise_name']);
        }

        return $candidat->create($data)
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
        //
        $candidat = Candidat::find($id);
        $data = request()->all();
        return $candidat->update($data)
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
        //
        $candidat = Candidat::findOrFail($id);
        $candidat->status = 0;

        return $candidat->save()
        ? redirect()->back()->withSuccess("Save operation completed successfully!")
        : redirect()->back()->withErrors("Save operation failed !");
    }
}
