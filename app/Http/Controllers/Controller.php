<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $search = request()->query('q');
        if($search){
            $articles = Article::where('title', 'LIKE', "%$search%")->get();
            // var_dump($articles);
        }else{
            $articles = Article::all();
        }
        return view('index', compact('articles','search'));
    }
}
