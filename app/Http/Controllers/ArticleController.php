<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function showAllArticles() 
    {
        return response()->json(Article::all());
    }

    public function showOneArticles($id) 
    {
        return response()->json(Article::find($id));
    }

    public function create(Request $request) 
    {
        //Validation
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required'
        ]);

        //Insert Record
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update($id, Request $request) 
    {
        //Validation
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required'
        ]);

        //Update Record
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete($id) 
    {
        Article::findOrFail($id)->delete();
        return response('Delete Succcessfully', 200);

    }
}
