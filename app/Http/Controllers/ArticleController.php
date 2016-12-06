<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isadmin'], ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Doit retourner la liste des articles
        $list = Article::orderBy('id', 'desc')->paginate(10);
        return view('articles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Doit retourner le formulaire de création des articles
        return view('articles.create');
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
            ->route('article.index')
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
        return view('articles.show', compact('article'));
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
        return view('articles.edit', compact('article'));
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
            ->route('article.index')
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
            ->route('article.index')
            ->with('success', 'L\'article a bien été supprimé.');
    }
}
