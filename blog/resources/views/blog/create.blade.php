@extends('layouts.app')
@section('content')
    <!-- content (s) -->


    <div>
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-12 control-group">
                <label>title</label><br/>
                <input type="text" name="title" class="form-control" placeholder="제목" required/>
            </div>
            <div class="col-12 control-group">
                <label>body</label><br/>
                <textarea name="body" class="form-control" placeholder="본문 입력" required></textarea>
            </div>
        </div>
        <input type="submit" value="저장" class="btn btn-primary"/>
    </form>
    </div>


    <a href="/blog" class="btn btn-secondary">목록</a>

    <!-- content (e) -->
@endsection
