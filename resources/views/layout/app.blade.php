<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Felatho - @yield('title')</title>  
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
      .feedback-alert {
        position: fixed;
        top: 8rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 40;
        padding: 1.25rem;
        width: auto;
        max-width: 90%;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        opacity: 1;
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
      }
      
      .feedback-alert.fade-out {
        opacity: 0;
        transform: translateX(-50%) translateY(-20px);
      }
    </style>
  </head>
  <body>


  <nav>
   @include('components.navbar')
  </nav>

  <main class="margen">
  @if (session('feedback.messages'))
      <div id="feedback-success" class="feedback-alert fixed bg-green-400 text-white">
          @foreach (session('feedback.messages') as $message)
              <p>{{ $message }}</p>
          @endforeach
      </div>
      <?php unset($_SESSION['feedback.messages']) ?>
    @endif

    @if (session('feedback.errors'))
      <div id="feedback-error" class="feedback-alert fixed bg-red-400 text-white">
          @foreach (session('feedback.errors') as $error)
              <p>{{ $error }}</p>
          @endforeach
          <?php unset($_SESSION['feedback.errors']) ?>
      </div>
    @endif
    @yield('content')
  </main>


  <footer>
   @include('components.footer')
  </footer>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
     
      function handleFeedbackAlerts(alertId) {
        const alert = document.getElementById(alertId);
        
        if (alert) {
        
          setTimeout(() => {
            
            alert.classList.add('fade-out');
            
           
            setTimeout(() => {
              alert.remove();
            }, 500); 
          }, 1000); 
          
          // Permitir cerrar al hacer clic
          alert.addEventListener('click', function() {
            alert.classList.add('fade-out');
            setTimeout(() => {
              alert.remove();
            }, 500);
          });
        }
      }
      
     
      handleFeedbackAlerts('feedback-success');
      handleFeedbackAlerts('feedback-error');
    });
  </script>

  @vite('resources/js/app.js')
</body>
</html>