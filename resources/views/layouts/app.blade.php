<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<div id="app">
    @yield('content')
</div>

<script src="/js/app.js"></script>
</body>
</html>