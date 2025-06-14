<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $article;
    public function __construct()
    {
        $this->article = new Article();
    }

    public function index()
    {
        $articles=Article::with('groupe')
            ->orderBy('group_id')
            ->orderBy('name')
            ->get();
        return response()->json(['articles'=>$articles],200);
    }

    public function articlesOf(Request $request)
    {
        $group_id=$request->get('groupe');
        if($group_id!=null){
            $articles=Article::with('groupe')
                ->where('group_id','=',$group_id)
                ->orderBy('name')
                ->get();
            return response()->json(['articles'=>$articles],200);
        }
        else return $this->index();
    }

    public function store(Request $request)
    {
        return $this->article->create($request->all());
    }


    public function show(string $id)
    {
        return $this->article->find($id);
    }


    public function update(Request $request, string $id)
    {
        $article = $this->article->find($id);
        $article->update($request->all());
        return $article;
    }

    public function destroy(string $id)
    {
        $article = $this->article->find($id);
        return $article->delete();
    }
}
