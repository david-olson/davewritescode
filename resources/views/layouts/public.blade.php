<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css?ver={{ \Carbon\Carbon::now()->format('YmdHis') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>David Olson | Full-Stack Web Developer</title>
</head>
<body class="home">
    @if(session('message.text'))
        <div class="message {{ session('message.style') }}" data-closable>
            <p>{{ session('message.text') }}</p>
            <button class="close-button" data-close>&times;</button>
        </div>
    @endif
    @yield('content')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <script src="/js/vendors.js"></script>
    <script src="/js/app.js?ver={{ \Carbon\Carbon::now()->format('YmdHis') }}"></script>
</body>
</html>
