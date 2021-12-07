@extends('vistaboostrap')
{{-- Aqui se manda a llamar nuestro menu, esto vendria siendo mas o menos como un include --}}

@section('contenido')
{{-- Aqui comienza nuestro @secction que fue declarado en el @yield de la vista ("vistaboostrap") que inclueremos en el resto de nuestras vistas  --}}
{{-- La vista(codigo) que estamos incluyendo en este archivo es la que esta en nuestro @extends, que en este caso se llama "vistaboostrap" --}}

{{-- @extends le permite "extender" una plantilla, que define sus propias secciones, etc.
Una plantilla que puede extender definirá sus propias secciones usando @yield ,
que luego puede poner sus propias cosas en su archivo de vista. --}}

<div class="container">
	<h1>Editar empleado</h1>
	<hr>

	<form action = "{{route('guardaredicion')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
		{{-- Token: Permite o evita que terceeros envien peticones de metodo post a nuestro formulario, evita ataques --}}
    <div class="well">

    	<div class="form-group">
    		<label for="dni">Clave empleado:</label>
    		<input type="text" name="ide" id="ide" value="{{$consulta->ide}}" readonly class="form-control" placeholder="Clave empleado" tabindex="5">
				{{-- El value="{{old('ide')}}" permite que al guardar y existan errores, nos conserve la informacion en los formularios (o inputs)  --}}
    		@if($errors->first('ide'))
    		<p class="text-danger">{{$errors->first('ide')}}</p>
    		@endif
				{{-- Los errores se guardan en un array llamado $errors --}}
				{{-- Nuestro codigo indica que nos muestre el primer error que encuentre en el campo ide --}}
    	</div>

    	<div class="row">
    		<div class="col-xs-6 col-sm-6 col-md-6">
    			<div class="form-group">
    				<label for="nombre">Nombre:</label>
    				<input type="text" name="nombre" id="nombre" value="{{$consulta->nombre}}" class="form-control" placeholder="Nombre" tabindex="1">
    				@if($errors->first('nombre'))
    				<p class="text-danger">{{$errors->first('nombre')}}</p>
    				@endif
    			</div>
    		</div>

    		<div class="col-xs-6 col-sm-6 col-md-6">
    			<div class="form-group">
    				<label for="apellido">Apellido:</label>
    				<input type="text" name="apellido" id="apellido" value="{{$consulta->apellido}}" class="form-control" placeholder="Apellido" tabindex="2">
    				@if($errors->first('apellido'))
    				<p class="text-danger">{{$errors->first('apellido')}}</p>
    				@endif
    			</div>
    		</div>
    	</div>

    	<div class="row">

    		<div class="col-xs-6 col-sm-6 col-md-6">
    			<div class="form-group">
    				<label for="email">Email:</label>
    				<input type="email" name="email" id="email" value="{{$consulta->email}}" class="form-control" placeholder="Email" tabindex="4">
    				@if($errors->first('email'))
    				<p class="text-danger">{{$errors->first('email')}}</p>
    				@endif
    			</div>
    		</div>

    		<div class="col-xs-6 col-sm-6 col-md-6">
    			<div class="form-group">
    				<label for="celular">Celular:</label>
    				<input type="text" name="celular" id="celular" value="{{$consulta->celular}}" class="form-control" placeholder="Celular" tabindex="3">
    				@if($errors->first('celular'))
    				<p class="text-danger">{{$errors->first('celular')}}</p>
    				@endif
    			</div>
    		</div>

    	</div>

    	<div class="row">
    		<div class="col-xs-6 col-sm-6 col-md-6">
    			<label for="dni">Sexo:</label>
          @if($consulta->sexo=='F')
    			<div class="custom-control custom-radio">
    				<input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" >
    				<label class="custom-control-label" for="sexo1">Masculino</label>
    			</div>
    			<div class="custom-control custom-radio">
    				<input type="radio" id="sexo2" name="sexo" value = "F" class="custom-control-input" checked="">
    				<label class="custom-control-label" for="sexo2">Femenino</label>
            @else
            <div class="custom-control custom-radio">
      				<input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" checked="">
      				<label class="custom-control-label" for="sexo1">Masculino</label>
      			</div>
      			<div class="custom-control custom-radio">
      				<input type="radio" id="sexo2" name="sexo" value = "F" class="custom-control-input">
      				<label class="custom-control-label" for="sexo2">Femenino</label>
            @endif
    			</div>


    		</div>

    		<div class="col-xs-6 col-sm-6 col-md-6">

    			<div class="form-group">
    				<label for="dni">Departamento:</label>
    				<select name = 'idd' class="custom-select">
    			 		<option value="{{$consulta->idd}}">{{$consulta->depa}}</option>

              @foreach($departamentos as $depa)
								{{-- recorre la variable departamentos, todo el array y le ponemos un alias --}}
							<option value="{{$depa->idd}}">{{$depa->nombre}}</option>
								{{-- viajara lo que tengo en $depa en el campo idd(llave primaria de departamentos) --}}
								{{-- Se le dice que de $depa obtenga el campo nombre --}}
							@endforeach

    				</select>
    			</div>

    		</div>
    	</div>

    	<div class="form-group">
    		<label for="dni">Descripción:</label>
    		<textarea name="descripcion" id="descripcion" class="form-control" tabindex="5">
          {{$consulta->descripcion}}
    		</textarea>
    	</div>

			<div class="form-group">
    		<label for="dni">Foto de perfil:</label>
				<img src="{{asset('archivos/'.$consulta->imagen)}}" class="rounded-circle" height="75" width="75" >
    		<input type="file" name="imagen" id="imagen" class="form-control" tabindex="6">
				{{-- type="file": permite cargar imagenes  --}}
				@if($errors->first('imagen'))
				<p class="text-danger">{{$errors->first('imagen')}}</p>
				@endif
    	</div>

    	<div class="row">
    		<div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="7"
    			title="Guardar datos"></div>
    		</div>
</form>

@stop
