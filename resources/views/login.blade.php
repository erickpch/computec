<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión</title>
  <<link href="{{ asset('css\login.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="left-section">
      <img src="{{ asset('imglogin.jpg') }}" alt="Image" >
    </div>
    <div class="right-section">
      <form method="POST" action="{{route('intento')}}">
        @csrf 
        <h2>Iniciar sesión</h2>
        <div class="input-container">
          <label for="username">Usuario</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="input-container">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required>
        </div>
            @if(session('error'))
            <div class="error-message">{{ session('error') }}</div>
            @endif
        <button type="submit">Ingresar</button>
      </form>
    </div>
  </div>
</body>
</html>
