<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        $save_data = [
            "blog_post_id" => $request->blog_post_id,
            "body" => $request->body,
            "user_id" => env("TESTER_ID",1)
        ];

        $created_comment = Comment::create($save_data);
        return $created_comment->id;
    }
}
