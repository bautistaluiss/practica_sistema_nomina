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
      <th scope="col">Posicion</th>
      <th scope="col">Foto</th>
      <th scope="col">Equipo</th>
      <th scope="col">PJ</th>
      <th scope="col">G</th>
      <th scope="col">E</th>
      <th scope="col">P</th>
      <th scope="col">GF</th>
      <th scope="col">GC</th>
      <th scope="col">DG</th>
      <th scope="col">Pts.</th>
    </tr>

  </thead>
  <tbody>
    {{-- Aqui se imprimen los registros en un foreach, estos vienen en un array almacenada en la variable $consulta --}}
  {{--  @foreach ($consulta as $imp) --}}






    <tr>


      <?php /*   $num_list = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
      echo $num_list . "\n";
 */?>






        @for($i=1; $i<=18; $i++ )
        @foreach($teams as $valor)
        <td>{{$i}}</td>





      <td>{{$valor->equipo}}</td>
      <td>{{$valor->Pj}}</td>
      <td>{{$valor->ganados}}</td>
      <td>{{$valor->empatados}}</td>
      <td>{{$valor->perdidos}}</td>
      <td>{{$valor->gf}}</td>
      <td>{{$valor->gc}}</td>
      <td>{{$valor->dg}}</td>
      <td>{{$valor->puntos}}</td>

    </tr>

    @endforeach
      @endfor


  {{-- @endforeach --}}

  </tbody>
</table>

</div>
@stop
