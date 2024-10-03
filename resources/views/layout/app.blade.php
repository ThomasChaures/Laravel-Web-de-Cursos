<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Felatho - @yield('title')</title>  
    <!-- CSS compilado por Vite -->
    @vite('resources/css/app.css')
    </head>
  <body>

  <!-- Componente Navbar -->
  <nav>
   @include('components.navbar')
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

   <!-- Componente Footer -->
  <footer>
   @include('components.footer')
  </footer>

  <!-- JavaScript compilado por Vite -->
@vite('resources/js/app.js')
</body>
</html>