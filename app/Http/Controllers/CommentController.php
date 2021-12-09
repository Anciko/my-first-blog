<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function store(Request $request,$aid) {
        $validator = Validator::make($request->all(), [
            "content" => "required"
        ]);
        if($validator->fails()) return redirect()->back()->withErrors($validator);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->article_id = $aid;
        $comment->user_id = $request->comment_user;
        $comment->save();

        return redirect()->back();
    }

    public function destroy($id) {
        echo $id;
        // $comment = Comment::find($id);
        // $comment->delete();

        // return redirect()->back();
    }
}
