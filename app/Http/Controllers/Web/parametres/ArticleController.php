<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\parametres\Groupedarticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {

        $articles =Article::latest()->paginate(10);
        return view('parametres.article.index'
            ,compact('articles',))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $groupes=Groupedarticle::all();
        return view('parametres.article.create'
            ,compact('groupes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'group_id'=>'required',
            'stockmin'=>'required',
            'nbrppal'=>'required',
            'unite'=>'required'
        ]);
        Article::create($request->all());
        return redirect()->route('article.index')
            ->with('success','Article ajouté avec success');
    }


    public function show(Article $article)
    {
        return view('parametres.article.show'
            ,compact('article'));
    }


    public function edit(Article $article)
    {
        $groupes=Groupedarticle::all();
        return view('parametres.article.edit'
            ,compact('article','groupes'));
    }


    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name'=>'required',
            'group_id'=>'required',
            'stockmin'=>'required',
            'nbrppal'=>'required',
            'unite'=>'required'
        ]);
        $article->update($request->all());
        return redirect()->route('article.index')
            ->with('success','Article modifiée avec success');
    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')
            ->with('success','Article supprimée avec success');
    }
}
