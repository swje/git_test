@extends('layouts.app')
@section('content')
    <!-- content (s) -->

    <div class="row">
        <div class="col-12">
            <h1>{{ $blogPost->title }}</h1>
            <p>{{ $blogPost->body }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            @if(Auth::check() && (Auth::id() == $blogPost->id))
                <a href="/blog/edit/{{ $blogPost->id }}" class="btn btn-primary btn-sm">수정</a>
            @endif
        </div>
        <div class="col-1">
            @if (Auth::check() && (Auth::id() == $blogPost->id))
                <form method="post" action="/blog/delete/{{ $blogPost->id }}">
                    @csrf
                    <input type="submit" value="삭제" class="btn btn-danger btn-sm" />
                </form>
            @endif
        </div>
    </div>

    <hr />

    @php(var_dump($blogPost))
    <div class="row">
        <div class="row">
            <h2>Comments</h2>
            <ul id="comment_list">
                @forelse ( $blogPost->comments() as $comment )
                    <li id="li_comment_{{ $comment->id }}">{{ $comment->body }}</li>
                @empty
                    댓글이 없습니다.
                @endforelse
            </ul>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-12">
            @if(Auth::check())
                <input type="text" id="comment_body" placeholder="댓글 입력" style="width: 400px;" />
                <input type="button" id="comment_save" value="댓글 등록" class="btn btn-primary btn-sm" />
            @endif
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $("#comment_save").click(function (){
                let blog_post_id = "{{ $blogPost->id }}";
                let comment_body = $("#comment_body").val();
                console.log("blog_post_id: "+blog_post_id);
                console.log("comment_body: "+comment_body);

                $.post("/comment", {
                    "blog_post_id" : blog_post_id,
                    "body" : comment_body
                }).done(function(data){
                    if(data.is_success){
                        alert("saved");
                        $("#comment_list").append('<li id="li_comment_'+data+'">'+comment_body+'</li>');
                        $("#comment_body").value('');
                    } else {
                        alert(data.reason);
                    }
                }).fail(function (data){
                    alert("error");
                });
            });
        });
    </script>

    <!-- content (e) -->
@endsection
