<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_test</title>
</head>
<body class="antialiased">

<form method="post">
    @csrf
    @method('POST')
    <div class="grid grid-cols-2 md:grid-cols-1">
        <div class="p-6">
            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    <label>title</label><br/>
                    <input type="text" name="title" value="{{ $blogPost->title }}"/>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    <label>body</label><br/>
                    <textarea name="body" style="width: 300px;height: 100px;">{{ $blogPost->body }}</textarea>
                </div>
            </div>
        </div>
        <input type="submit" value="저장"/>
    </div>
</form>

</body>
</html>
