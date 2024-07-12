<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_test</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body class="antialiased">
<div>APP_NAME = {{ env('APP_NAME') }}</div>
<div>APP_ENV = {{ config('app.env') }}</div>

<form method="post">
    @csrf
    <div class="grid grid-cols-2 md:grid-cols-1">
        <div class="grid grid-cols-2 md:grid-cols-1">
            <div class="p-6">
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <label>email</label><br/>
                        <input type="text" name="email" id="name" />
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-1">
            <div class="p-6">
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <label>password</label><br/>
                        <input type="password" name="password" id="password" />
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="로그인"/>
        @if ($errors->any())
            <p><strong>{{$errors->first()}}</strong></p>
        @endif
    </div>
</form>

</body>
</html>
