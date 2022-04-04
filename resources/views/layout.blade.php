<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="/resources/views/layouts/app" rel="stylesheet">

  <script src="{{ asset('js/app.js') }}"></script>

  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/welcome">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="/user">Usuarios</a>
          <a class="nav-link" href="/client">Clientes</a>
          <a class="nav-link" href="/city">Ciudades</a>
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Salir</a>
        </div>
      </div>
      <form id="frm-logout" action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
      </form>
    </div>
  </nav>
  </body>
  <div class="container">
    @yield('content')
  </div>


</html>