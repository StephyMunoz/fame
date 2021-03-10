<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>

  
  <script src="/js/app.js" defer></script>
  
  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <nav class="nav">
        <ul class="nav">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Ingreso a concurso</a></li>
            <li class="nav-item"><a href="/home" class="nav-link">Ingreso datos concursante</a></li>
            <li class="nav-item"><a href="/resultados" class="nav-link">Resultados</a></li>
            <li class="nav-item"><a href="/vae" class="nav-link">Ingreso vae por ofertante</a></li>
            
        </ul>
    </nav>
    @yield('navigation')
</body>
</html>