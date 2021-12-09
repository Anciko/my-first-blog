<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::with('user')->latest()->paginate(3);
        return view('articles.index', compact('articles'));
    }

    public function create() {
       return view('articles.create');
    }

    public function store(Request $request) {
       $validator = Validator::make($request->all(), [
           'title' => 'required',
           'desc' => 'required'
       ]);

       if($validator->fails()) {
           return redirect()->back()->withErrors($validator);
       }

       $article = new Article();
       $article->title = $request->title;
       $article->body = $request->desc;
       $article->save();

       return redirect()->route('articles')->with('success', 'Article is created successfully!');
    }

    public function show($id) {
        $article = Article::with('user')->find($id);
        $comments = Comment::all();
        return view('articles.show', compact('article', 'comments'));
    }

    public function edit($id) {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $article = Article::find($id);

        $article->title = $request->title;
        $article->body = $request->desc;
        $article->update();

        return redirect()->route('articles')->with('success', 'Article is updated successfully!');
    }

    public function destroy($id) {
       $article = Article::find($id);
       $article->delete();
       return redirect()->route('articles');
    }
}
