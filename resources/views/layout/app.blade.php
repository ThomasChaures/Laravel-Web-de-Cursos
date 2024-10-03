<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto - @yield('title')</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home')}}">Home</a>
        </li>
        @auth
    <li class="nav-item">
        <form action="{{ url('/cerrar-sesion') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">
                Cerrar sesión
            </button>
        </form>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.login') }}">Iniciar Sesión</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.register') }}">Registrarse</a>
    </li>
@endauth

          
      </ul>
    </div>
  </div>
</nav>

  <main>
  @if (session('feedback.messages'))
      <div class="alert alert-success">
          @foreach (session('feedback.messages') as $message)
              <p>{{ $message }}</p>
          @endforeach
      </div>
    @endif

    @if (session('feedback.errors'))
      <div class="alert alert-danger">
          @foreach (session('feedback.errors') as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
    @endif
    @yield('content')
  </main>

  <footer>

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>