<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
             <div class="row">
                 <div class="col-8">
                     <h1 class="display-one">test laravel</h1>
                     <p>learn laravel for 2 weeks</p>
                 </div>
                 <div class="col-4">
                     @if(Auth::check())
                         <a href="/auth/logout">로그아웃</a>
                     @else
                         <a href="/auth/login">로그인</a>
                         <a href="/auth/regist">회원가입</a>
                     @endif
                 </div>
             </div>
            @yield('content')
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</body>
</html>
