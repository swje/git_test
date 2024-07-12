<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_test</title>
</head>
<body class="antialiased">

<p>{{ $blogPost->title }}</p>
<p>{{ $blogPost->body }}</p>
<a href="/blog/edit/{{ $blogPost->id }}">수정</a>
<form method="post" action="/blog/delete/{{ $blogPost->id }}">
    @csrf
    <input type="submit" value="삭제" />
</form>

<hr />
<h2>Comments</h2>
<ul id="comment_list">
    @forelse ( $blogPost->comments() as $comment )
        <li id="li_comment_{{ $comment->id }}">{{ $comment->body }}</li>
    @empty
        댓글이 없습니다.
    @endforelse
</ul>

<hr />
<input type="text" id="comment_body" placeholder="댓글 입력" />
<input type="button" id="comment_save" value="댓글 등록" />
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
                } else {
                    alert(data.reason);
                }
            }).fail(function (data){
                alert("error");
            });
        });
    });
</script>

</body>
</html>
