@extends('layouts.app')
@section('content')
    <!-- content (s) -->

    <div class="row">
        <ul>
            @php ($count=1)
            @forelse( $blogPosts as $blogPost )
                <li>{{ $count }} <a href="/blog/{{ $blogPost->id }}">{{ $blogPost->title }}</a> </li>
                @php ($count++)
            @empty
                <li><p>게시글이 없습니다.</p></li>
            @endforelse
        </ul>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="/blog/create" class="btn btn-primary btn-sm">글쓰기</a>
        </div>
    </div>

    <!-- content (e) -->
@endsection
