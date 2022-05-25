
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Styles -->
<style>
</style>

<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
</style>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    
    <header>@yield('navbar') </header>
            @yield('content')
</body>
