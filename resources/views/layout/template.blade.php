<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include("layout.assets.css.css")
    @include("layout.assets.js.script")
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    @yield("main")
</body>
</html>