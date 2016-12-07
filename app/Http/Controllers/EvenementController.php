<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Doit retourner la liste des evenements

        $list = Evenement::orderBy('id', 'desc')->paginate(10);

        return view('evenements.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Doit retourner le formulaire de création des evenements

        return view('evenements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Doit enregistrer un nouvel evenement depuis un formulaire

        $evenement = new Evenement;

        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        $evenement->fill($input)->save();

        return redirect()->route('evenement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Doit retourner la page d'un evenement spécifique

        $evenement = Evenement::findOrFail($id);

        return view('evenements.show', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Doit retourner le formulaire d'édition d'un evenement spécifique

        $evenement = Evenement::findOrFail($id);

        return view('evenements.edit', compact('evenement'));
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
        //Doit enregistrer les modifications faites à un evenement

        $evenement = Evenement::findOrFail($id);

        $input = $request->input();
        $evenement->fill($input)->save();

        return redirect()->route('evenement.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Doit supprimer un evenement spécifique

        $evenement = Evenement::findOrFail($id);

        $evenement->delete();

        return redirect()->route('evenement.index');
    }
}
