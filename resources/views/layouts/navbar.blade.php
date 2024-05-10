<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('nombre')</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  


    <!-- Font Awesome (iconos) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- JavaScript y Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="{{ asset('js\adminlte.js') }}"></script>


  <link href="{{ asset('css\navbar.css') }}" rel="stylesheet">
  <link href="{{ asset('css\adminlte.css') }}" rel="stylesheet">
  <link href="{{ asset('css\paginas.css') }}" rel="stylesheet">

  <script src="{{ asset('js\adminlte.js') }}"></script>

</head>
<body>


<div class="contenedorMayor">
    <!-- Navbar -->
    <div class="subdivHorizontal"> 
        <div class="navbar-propio">    
            <img src="{{ asset('logo.png') }}" class="navbar-logo">
            
            <a href="{{ route('home') }}" class="navbar-brand">COMPUTEC</a>
        </div>
    </div>

<!-- Panel lateral -->
    <div class="subdivHorizontal">  
        <div class="sidebar">

            <br>
            <div class="datos-container">
                <img src="{{ asset('personalogo.png') }}" class="persona-logo">        
            </div>
            <div class="datos-container">
                Usuario: {{$persona->name}}
                <br>
                {{$permiso}}
           
               
            </div>
            <div id="permiso" data-permiso="{{ $permiso }}"></div>
            
            <div style="height: 30px"></div>
            <a href="{{ route('r.user') }}" class="menu-item">Usuarios</a>
            <a href="{{ route('r.proveedor') }}" class="menu-item">Proveedores</a>


            <a href="{{ route('logout') }}" class="menu-item">Salir</a>
        </div>

    <!-- Contenido principal -->
    <div  class="main-content"  >
        <div style="height: 100;"><br><br></div>
        <!-- Contenido de la página -->
        <div class="horizontal-bar">
            <div class="wordart-title" style="margin-left: 70px; padding: 30px">@yield('titulo')</div>   
        </div>

        <div class="horizontal-whitebar"></div>
        <div class="horizontal-bar" style="display: flex; flex-direction: column;flex: 1; " >
        <div style="padding: 10px; ">

            <!-- Contenido de otra pagina -->
        @yield('contenido')

        </div>
        
        </div>
    </div>
</div>





  <footer>
    <div class="container-fluid">
      <span>&copy; Propiedad de Computec.SRL</span>
    </div>
  </footer>
  </div>
      <!-- Footer -->

</body>
</html>
