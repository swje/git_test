<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        if(!Auth::check()){
            return [
                "is_success" => false,
                "reason" => "로그인 상태가 아닙니다."
            ];
        }

        $validated = $request->validate([
            'blog_post_id' => 'required|integer|gt:0',
            'body' => 'required|min:3|max:100',
        ]);

        $save_data = [
            "blog_post_id" => $request->blog_post_id,
            "body" => $request->body,
            "user_id" => env("TESTER_ID",1)
        ];

        $created_comment = Comment::create($save_data);
        // return $created_comment->id;
        return [
            "is_success" => true,
            "comment_id" => $created_comment->id
        ];
    }
}
