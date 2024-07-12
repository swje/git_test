<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(!Auth::check()){
            return redirect("/blog");
        }
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
        if(!Auth::check()){
            return redirect("/blog");
        }
        $save_data = [
            "title" => $request->title,
            "body" => $request->body,
            //"user_id" => env('TESTER_ID', 1),
            "user_id" => Auth::id(),
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
        if(!Auth::check()){
            return redirect("/blog");
        }

        $blogPost = BlogPost::find($blog_post_id);

        if(Auth::id() != $blogPost->user_id){
            return redirect("/blog/{$blogPost->id}");
        }

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
        if(!Auth::check()){
            return redirect("/blog");
        }
        if(Auth::id() != $blogPost->user_id){
            return redirect("/blog/{$blogPost->id}");
        }

        $save_data = [
            "title" => $request->title,
            "body" => $request->body,
            //"user_id" => env('TESTER_ID', 1),
            "user_id" => Auth::id(),
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
        if(!Auth::check()){
            return redirect("/blog");
        }
        if(Auth::id() != $blogPost->user_id){
            return redirect("/blog/{$blogPost->id}");
        }

        $blogPost->delete();
        return redirect("/blog");
    }
    public function delete($blog_post_id)
    {
        BlogPost::destroy($blog_post_id);
        return redirect("/blog");
    }

}
