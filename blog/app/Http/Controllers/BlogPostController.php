<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return BlogPost::all();
        $blogPosts = BlogPost::all();
        return view('blog.list', ['blogPosts' => $blogPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save_data = [
            "title" => $request->title,
            "body" => $request->body,
            "user_id" => env('TESTER_ID', 1),
        ];

        $created_post = BlogPost::create($save_data);

        return redirect("/blog/{$created_post->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
//        return $blogPost;
        return view('blog.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($blog_post_id)
    {
        $blogPost = BlogPost::find($blog_post_id);
        return view('blog.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $save_data = [
            "title" => $request->title,
            "body" => $request->body,
            "user_id" => env('TESTER_ID', 1),
        ];

        $blogPost->update($save_data);

        return redirect("/blog/{$blogPost->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect("/blog");
    }
    public function delete($blog_post_id)
    {
        BlogPost::destroy($blog_post_id);
        return redirect("/blog");
    }

}
