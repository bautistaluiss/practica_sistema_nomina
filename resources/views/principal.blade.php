@extends('vistaboostrap')
{{-- Aqui se manda a llamar nuestro menu, esto vendria siendo mas o menos como un include --}}

@section('contenido')

<div class="container">
<h1>REGITROS DE EMPLEADOS</h1>

<br>
<a href="{{route('altaempleado')}}">
<button type="button" class="btn btn-success">Alta de empleado</button>
</a>
<br>
<br>

{{-- Usando sessiones flash, el mensaje es lo que viene desde el el controlador, Este mensaje se usa en donde retornara al guardar --}}
  @if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif



<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Clave</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Área</th>
      <th scope="col">Email</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    {{-- Aqui se imprimen los registros en un foreach, estos vienen en un array almacenada en la variable $consulta --}}
    @foreach ($consulta as $imp)
    <tr>
      <td><img src="{{asset('archivos/'.$imp->imagen)}}" class="rounded-circle" height="45" width="45" ></td>
      {{-- Se le dice qud vaya a buscar a la carpeta archivos la imagen con el nombre qie viene en imagen --}}
      <th scope="row">{{$imp->ide}}</th>
      <td>{{$imp->nombre}}</td>
      <td>{{$imp->apellido}}</td>
      <td>{{$imp->depa}}</td>
      <td>{{$imp->email}}</td>
      <td>
        <a href="{{route('editarempleado',['ide'=>$imp->ide])}}">
        <button type="button" class="btn btn-info">Editar</button>
        </a>

        @if($sessiontipo=="admin") {{-- Sesion --}}

        @if($imp->deleted_at)
        <a href="{{route('activarempleado',['ide'=>$imp->ide])}}">
          {{-- especificamos nuestra ruta, seguido del parametro esperado y le vamos a indicar que lo que viajar al controlador es lo que tengo en $imp en el campo ide --}}
        <button type="button" class="btn btn-warning">Activar</button>
        </a>
        <a href="{{route('borrarempleado',['ide'=>$imp->ide])}}">
          {{-- especificamos nuestra ruta, seguido del parametro esperado y le vamos a indicar que lo que viajar al controlador es lo que tengo en $imp en el campo ide --}}
        <button type="button" class="btn btn-primary">Eliminar</button>
        </a>
        @else
        <a href="{{route('desactivarempleado',['ide'=>$imp->ide])}}">
          {{-- especificamos nuestra ruta, seguido del parametro esperado y le vamos a indicar que lo que viajar al controlador es lo que tengo en $imp en el campo ide --}}
        <button type="button" class="btn btn-danger">Desactivar</button>
        </a>
        @endif

        @endif

      </td>
    </tr>
    @endforeach

  </tbody>
</table>

</div>
@stop
