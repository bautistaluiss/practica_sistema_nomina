<!DOCTYPE html>
<?php
$usuario = session('sesionusuario'); //sesion
$tipo = session('sesiontipousuario'); //sesion
$idu = session('sesionidusuario'); //sesion -> todo lo que diga sesion es de la seguridad de rutas y logueo
?>
<html>
<head>
	<title>Boostrap</title>
	<link href="https://bootswatch.com
	/4/darkly/bootstrap.min.css" rel="stylesheet" >
{{-- toastr cdn --}}
 <script src="jquery.min.js"></script>
 <link href="toastr.css" rel="stylesheet"/>
 <script src="toastr.js"></script>
@toastr_css



</head>
<body>
<h1>hi world</h1>
<br>
<b> Bienvenido <?php echo $usuario //sesion?></b>
<br>
<b> Tipo de usuario: <?php echo $tipo //sesion?></b>
<br>
<b> ID Usuario <?php echo $idu //sesion?></b>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('index')}}">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('registros')}}">Gestión de Empleados

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('cerrarsesion')}}">Cerrar sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div id="contenido">
	@yield('contenido')
	{{-- Esta es el contenido que se cargara en las demas plantillas cuando se utilice el @include --}}
	{{-- Con el @yield definimos nuestra seccion, es decir estamos indicando que nuestro codigo continua y comenzara donde definamos nuestro @secction --}}
</div>
@jquery
	 @toastr_js
	 @toastr_render
</body>
</html>
