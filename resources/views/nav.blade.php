<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Ingreso de datos</a></li>
            <li ><a href="/registro">Registro de empresa</a></li>
            <li ><a href="/resultados">Resultados</a></li>
        </ul>
    </nav>
    @yield('navigation')
</body>
</html>