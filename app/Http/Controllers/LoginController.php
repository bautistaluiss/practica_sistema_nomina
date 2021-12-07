<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash; //Libreria para ocuoar instrucciones de hash(mecanismo de encriptacion)
use Illuminate\Http\Request;
use App\Models\usuarios;
use Session;

class LoginController extends Controller
{
  //Retornar a la vista del login
  public function login(){
    return view('login');
  }
  //Validacion del login
  public function validatelogin(Request $request){
    $this->validate($request,[
      //los nombres son los de los name de las inputs de la vista.
    'usuario' => 'required',
    'password' => 'required',
    ]);
    //$passwordencriptado = Hash::make($request->password); //Encripta lo que vine en desde la vista en el campo password.
    //echo $passwordencriptado;

    $consulta =usuarios::where('user',$request->usuario) //Va buscar en BD domde lo que tiene eñ campo user sea igual a lo que trae el $request den la imput con name usuario
    ->where('activo','si') //Y que el campo activo sea igual a si
    ->get(); //Si el usuario existe y es activo, obtendra la informacion de ese registro y me la devolvera.
    $cuantos= count($consulta); //Cuenta cuantos registros devolvio la consulta
      //dd($cuantos);
    if ($cuantos == 1 and hash::check($request->password, $consulta[0]->password)) {
      //Compara el password que se esta tecleando en el formulario con el de nuestra consulta(lo que esta en base de datos).
      //Si cuantos es igual a 1 y que el hash haga un check de lo que esta recibiendo el usuario en el request y que lo compare con lo que esta devolviendo la consulta en el campo password.
      //ESTAS SESIONES NOS SIRVEN PARA RESTRICION DE VISTA Y SABER QUE USUARIO MODIFICO TALES DATOS
      Session::put('sesionusuario',$consulta[0]->nombre . ' ' .$consulta[0]->apellido); //sesion-1
      //Creando una sesion que llevara por nombre lo que se concatene del nombre y del apellido de la persona logueada.
      Session::put('sesiontipousuario',$consulta[0]->tipo); //sesion-2
      //Sesion para tipo de usuario, crea la session tipo de usuario y obtiene el valor.
      Session::put('sesionidusuario',$consulta[0]->idu); //sesion-2
      //Sesion para id de usuario.
      toastr()->info('Inicio de sesion exitoso','Bienvenido');
      //return view('principal'); //Redirecciona a una vista
      return redirect('index');
    }
    else {
      toastr()->warning('Verfique que sus datos sean correctos o el usuario este activo','No fue posible acceder');
      //return view('principal'); //Redirecciona a una vista
      return redirect('iniciosesion');
    }
  }

  //Restriccion de la vista con ruta index
  public function viewindex(){
    $sessioniduser= session('sesionidusuario'); //Sesion
    if($sessioniduser<>""){ //Si la sesion es diferente a vacio
      return view('vistaboostrap'); //Retorna a la vista bootstrap
    }
    else {
      toastr()->warning('Aun no estas logueado','ACCESO DENEGADO'); //Si no manda un error y retorna al login
      return redirect('iniciosesion');
    }

  }

  //Cierre de sesion
  public function logout(){
    Session::forget('sesionusuario');
    Session::forget('sesiontipousuario');
    Session::forget('sesionidusuario');
    Session::flush();
    toastr()->info('Su sesion ha sido finalizada exitosamente','Cierre de sesión'); 
    return redirect('iniciosesion');
  }

}
