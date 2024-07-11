<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_test</title>
</head>
<body class="antialiased">

<ul>
    @php ($count=1)
    @forelse( $blogPosts as $blogPost )
        <li>{{ $count }} <a href="/blog/{{ $blogPost->id }}">{{ $blogPost->title }}</a> </li>
        @php ($count++)
    @empty
        <li><p>게시글이 없습니다.</p></li>
    @endforelse
</ul>
<form method="get" action="/auth/logout">
    <input type="submit" value="logout" />
</form>

</body>
</html>
