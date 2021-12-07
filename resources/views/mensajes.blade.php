@extends('vistaboostrap')
{{-- Aqui se manda a llamar nuestro menu, esto vendria siendo mas o menos como un include --}}

@section('contenido')

<div class="container">
<h1>PROCESO {{$proceso}}</h1>
<br>
<div class="alert alert-success">{{$mensaje}}</div>
</div>
@stop
