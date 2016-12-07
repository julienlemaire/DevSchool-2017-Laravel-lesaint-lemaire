<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Evenement;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isadmin']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Doit retourner la liste des articles
        $list = Article::all();
        return view('admins.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Doit retourner le formulaire de création des articles
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|min:6',
                'content' => 'required|min:10'
            ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Le titre doit contenir au moins 6 caractéres',

                'content.required' => 'Contenu requis',
                'content.min' => 'L\'article doit contenir au moins 10 caractéres'
            ]);

        $article = new Article;
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        $article->fill($input)->save();

        return redirect()
            ->route('admin.index')
            ->with('success', 'L\'article a bien été ajouté.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Doit retourner la page d'un article spécifique
        $article = Article::findOrFail($id);
        return view('admins.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Doit retourner le formulaire d'édition d'un article spécifique
        $article = Article::findOrFail($id);
        return view('admins.edit', compact('article'));
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

        $this->validate($request,
            [
                'title' => 'required|min:6',
                'content' => 'required|min:10'
            ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Le titre doit contenir au moins 6 caractéres',

                'content.required' => 'Contenu requis',
                'content.min' => 'L\'article doit contenir au moins 10 caractéres'
            ]);


        $article = Article::findOrFail($id);
        $input = $request->input();
        $article->fill($input)->save();

        return redirect()
            ->route('admin.index')
            ->with('success', 'L\'article a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()
            ->route('admin.index')
            ->with('success', 'L\'article a bien été supprimé.');
    }







    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexs()
    {
        // Doit retourner la liste des evenements

        $list = Evenement::all();

        return view('admins.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creates()
    {
        //Doit retourner le formulaire de création des evenements

        return view('admins.creates');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stores(Request $request)
    {
        //Doit enregistrer un nouvel evenement depuis un formulaire

        $this->validate($request,
            [
                'nom' => 'required|min:3',
                'description' => 'required|min:10',
                'date_debut' => 'required',
                'date_fin' => 'required',
                'lieu' => 'required|min:5',
                'tarif' => 'required|min:1'

            ],
            [
                'nom.required' => 'Titre requis',
                'nom.min' => 'Le titre doit contenir au moins 3 caractères',

                'description.required' => 'Description requis',
                'description.min' => 'L\'article doit contenir au moins 10 caractères',

                'date_debut.required' => 'Date de début requis',
                'date_debut.date' => 'Type de format requis',

                'date_fin.required' => 'Date de fin requis',
                'date_fin.date' => 'Type de format requis',

                'lieu.required' => 'Lieu requis',
                'lieu.min' => 'Le lieu doit contenir au moins 5 caractères',

                'tarif.required' => 'Tarif requis',
                'tarif.min' => 'Le lieu doit contenir au moins un caractère'
            ]);

        $evenement = new Evenement;
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $evenement->fill($input)->save();

        return redirect()
            ->route('admin.indexs')
            ->with('success', 'L\'événement a bien été ajouté.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shows($id)
    {
        //Doit retourner la page d'un evenement spécifique

        $evenement = Evenement::findOrFail($id);

        return view('admins.shows', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edits($id)
    {
        //Doit retourner le formulaire d'édition d'un evenement spécifique

        $evenement = Evenement::findOrFail($id);

        return view('admins.edits', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updates(Request $request, $id)
    {
        //Doit enregistrer les modifications faites à un evenement

        $this->validate($request,
            [
                'nom' => 'required|min:3',
                'description' => 'required|min:10',
                'date_debut' => 'required',
                'date_fin' => 'required',
                'lieu' => 'required|min:5',
                'tarif' => 'required|min:1'

            ],
            [
                'nom.required' => 'Titre requis',
                'nom.min' => 'Le titre doit contenir au moins 3 caractères',

                'description.required' => 'Description requis',
                'description.min' => 'L\'article doit contenir au moins 10 caractères',

                'date_debut.required' => 'Date de début requis',
                'date_debut.date' => 'Type de format requis',

                'date_fin.required' => 'Date de fin requis',
                'date_fin.date' => 'Type de format requis',

                'lieu.required' => 'Lieu requis',
                'lieu.min' => 'Le lieu doit contenir au moins 5 caractères',

                'tarif.required' => 'Tarif requis',
                'tarif.min' => 'Le lieu doit contenir au moins un caractère'
            ]);


        $evenement = Evenement::findOrFail($id);
        $input = $request->input();
        $evenement->fill($input)->save();

        return redirect()
            ->route('admin.indexs')
            ->with('success', 'L\'événement a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroys($id)
    {
        //Doit supprimer un evenement spécifique

        $evenement = Evenement::findOrFail($id);

        $evenement->deletes();

        return redirect()
            ->route('admin.indexs')
            ->with('success', 'L\'événement a bien été supprimé.');
    }
}
