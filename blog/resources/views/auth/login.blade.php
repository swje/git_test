<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_test</title>
</head>
<body class="antialiased">

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
