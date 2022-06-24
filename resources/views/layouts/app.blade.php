<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>jobinhood - Leader job portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="jobinhood - The 1st job portal in the UK">
    <meta name="keywords" content="jobinhood">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="flex flex-col min-h-screen">
<x-page-header/>

<div class="flex-grow flex flex-col">
    @yield('content')
</div>

<x-page-footer/>

@stack('scripts')

</body>
</html>
