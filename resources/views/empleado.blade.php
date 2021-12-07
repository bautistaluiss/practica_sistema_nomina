<!DOCTYPE html>
<html>
<head>
	<title>Empleado</title>
	<link rel="stylesheet" type="text/css" href={{asset('css/estilo.css')}}>
</head>
<body>

	<h1>EMPLEADOS CORP</h1>

	<br>
	<!-- Para imprimir valores en blade es con; {{ asi! }} -->
	<!-- Las variables impresas son los datos que se mandan en los with desde el controlador -->
	<p>El empleado {{$nombre}} trabajó {{$dias}} dias con nomina de: ${{$nomina}}</p>
	<br>
	@if($nombre=="Brad")
	<h1>Bienvenido Brad P.</h1>
	<br>
	<img src="{{asset('fotos/Brad_Pitt.jpg')}}">
	@else
	<h1>Usuario sin foto</h1>
	@endif

	@if($nombre=="Emilia")
	<h1>Bienvenido Emilia K.</h1>
	<br>
	<img src="{{asset('fotos/Emilia_Clarke.jpg')}}">
	@else
	<h1>Usuario sin foto</h1>
	@endif

	<a href="{{route('salir')}}">Cerrar nomina</a>
</body>
</html>
