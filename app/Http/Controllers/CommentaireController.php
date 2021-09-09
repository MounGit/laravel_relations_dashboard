<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        $user = User::all();
        $article = Article::all();
        return view('pages.commentaires.commentaires', compact('commentaire', 'user', 'article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::all();
        return view('pages.commentaires.commentaireCreate', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'article_id' => 'required'
        ]);
        $commentaire = new Commentaire;
        $commentaire->content = $request->content;
        $commentaire->article_id = $request->article_id;
        $commentaire->save();
        return redirect()->route('commentaires.index')->with('message', 'Commentaire ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        $article = Article::all();
        $user = User::all();
        return view('pages.commentaires.commentaireShow', compact('commentaire', 'article', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        $article = Article::all();
        return view('pages.commentaires.commentaireEdit', compact('commentaire', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'content' => 'required',
            'article_id' => 'required'
        ]);
        $commentaire->content = $request->content;
        $commentaire->article_id = $request->article_id;
        $commentaire->save();
        return redirect()->route('commentaires.index')->with('message', 'commentaire modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index')->with('message', 'commentaire supprimé avec succès');
    }
}
