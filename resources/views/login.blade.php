@extends('vistaboostrap')

@section('contenido')

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{route('validacionlogin')}}" method="POST">
          {{csrf_field()}}
          <br>
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center lead fw-normal fw-bold mx-3 mb-0">INICIAR SESION</p>
          </div>
          <br>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text"name="usuario" id="usuario" class="form-control form-control-lg"
              placeholder="Ingrese un usuario" value="{{old('usuario')}}" />
              @if($errors->first('usuario'))
                <p class="text-danger">{{$errors->first('usuario')}}</p>
              @endif
            <label class="form-label" for="form3Example3"></label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="password" class="form-control form-control-lg"
              placeholder="Ingrese una contraseña" value="{{old('password')}}"/>
              @if($errors->first('password'))
                <p class="text-danger">{{$errors->first('password')}}</p>
              @endif
            <label class="form-label" for="form3Example4"></label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" value="iniciar" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesion</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>
    <br>
    <br>
    @if(Session::has('mensaje'))
    <div class="alert alert-danger">{{Sesion::get('mensaje')}}</div>
    @endif



@stop
