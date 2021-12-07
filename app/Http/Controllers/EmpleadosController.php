<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados; //acceder a nuestro modelo empleado
use App\Models\departamentos; //acceder a nuestro modelo departamentos
use App\Models\nominas; //acceder a nuestro modelo nominas
use App\Models\tablaposiciones;
//use Brian2694\Toastr\Facades\Toastr; //Alertas de CRUD con toastr
use Session; //Usando sesiones flash

//comnado para crear un controlador---> php artisan make:controller NombreDelControlador

class EmpleadosController extends Controller
{
  public function message(){
    return "Hi Worker";
  }

  public function payment(){
    $dias = 7;
    $pago = 600;
    $nomina = $dias * $pago;

    return 'Su pago del empleado es: '.$nomina.' con respecto a '.$dias.' dias laborados y un pago diario de $'.$pago ;
  }

  public function payroll($diast, $pago){
    $nomina = $diast * $pago;
    return 'Su pago del empleado es: '.$nomina.' con respecto a '.$diast.' dias laborados y un pago diario de $'.$pago ;
  }

  public function greeting($nombret, $diast){
    $pago =100;
    $nomina = $diast * $pago;

    //return view('empleado', compact('nombre', 'dias')); Mandar valores a la vista
    //return view('empleado', ['nombre'=>$name, 'dias'=>$day]); Mandar valores a la vista
    //los datos dentro del corchete son los que se madan a la vista y se imprimen con el valor que esta en comillas simples, en vista se imprime en forma de variable.

    return view('empleado')
    ->with('nombre',$nombret)
    ->with('dias',$diast)
    ->with('nomina',$nomina);
    //Todos los ->with son los valores que se enviaran a la vista.
    //El valor en comillas simples es el que sera tomado en la vista, en forma de variable
  }

  public function getout(){
    return "salir";
  }

  public function boostrapview(){
    return view('vistaboostrap');
  }

  public function viewone(){
    return view('vista1');
  }

  public function viewtwo(){
    return view('vista2');
  }

  /*public function highemployee(){
    return view('altaempleado');
  } */


  /*public function saveemployee(Request $request){
    //Toda la informacion se que teclee en el formulario de altaempleado llegara a esta funcion por medio del $request
    $nombre = $request->nombre;
    $sexo = $request->sexo;

    //dd($request);
    //return $request;

    //Validaciones
    $this->validate($request,[
    'ide' => 'required|regex:/^[E][M][P][-][0-9]{5}$/',
    'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
    'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
    'email' => 'required|email',
    'celular' => 'required|regex:/^[0-9]{10}$/'
    ]);
    echo "Todo bien, todo nice";
    //return view('vista2');
  } */

  public function eloquent(){
    //$empleados = empleados::find(2); //Busca al empleado por su llave primaria "2"
    //$empleados->delete(); //Y lo elimina

    //$empleados = empleados::where('sexo', 'M')->delete(); //Elimina a todos los empleados de sexo Masculino
    // ->where() antes del ->delete(); para mas condciones.

    //empleados::destroy(1); //Elimina el empleado con id 1

  /*  $empleados = empleados::find(1);
    $empleados->delete(); */
    //Desactiva logicamente el empleado con el id 1 para que no se muestre en la vista, sucede solo al usar softdeletes en nuestro modelo y teniendo el campo delete_at en nuestra BD.

  //$consulta = empleados::all();
  //Muestra toodos los empleados que hay en la tabla.
  //El empleados que esta antes del ::all(); es nuestro modelo.

    //$consulta = empleados::withTrashed()->get();
    //Obitne todos los registros de la tabla empleados, incluyendo los que estan borrados logicamente (desactivados).

    //$consulta = empleados::onlyTrashed()->get();
    //Obitne todos los registros que estan eliminados logicamente de la tabla empleados.

    //$consulta = empleados::onlyTrashed() //Obitne todos los registros que estan eliminados logicamente
    //->where('sexo','F') //Donde el sexo sea F
    //->get(); //Y los obtiene

    //empleados::withTrashed()//Reestablece el empleado eliminado logicamente
    //->where('ide','1')
    //->restore();
    //return "Usuario reestablecido";

  //  $emepleados= empleados::find(3)->forceDelete(); //Elimina definitivamente ded la BD el registro con id 1.
    //$consulta = empleados::all(); //Consulta de todos los registro de la table empleados

    //$consulta = empleados::where('sexo','M')->get(); //Obtiene todos los registros donde el sexo sea M

    //$consulta = empleados::where('edad','>=','20') //Muestra todos los empleados que tengan una edad mayor o igual que 20..
    //->where('edad','<=','30') //..y menor o igual que 30
    //->get();

    //$consulta= empleados::whereBetween('edad',[27,41])->get();//Muestra los empleados en el rango de edad de 27 y 41 años.
    //Esta consulta es parte de eloquent
    //$consulta= empleados::whereIn('ide',[1,2,3])
    //->orderBy('nombre','desc') //Muestra los empleados con id 1,2 y 3 y los ordena de manera descendente.
    //->get();

    //$consulta = empleados::where('edad','>=','20') //Muestra todos los empleados que tengan una edad mayor o igual que 20..
    //->where('edad','<=','40') //..y menor o igual que 30
    //->take(2) //Solo muestra los dos primeros.
    //->get();

    //$consulta= empleados::select(['nombre','apellido','edad','salario'])//Muestra el nombre, apellido, edad y salario de los registros...
    //->where('edad','>=',30) //..Dodne la edad sea mayor o igual a 30.
    //->get();

    //$consulta= empleados::select(['nombre','apellido','edad','salario'])//Muestra el nombre, apellido, edad y salario de los registros...
    //->where('apellido','LIKE','%rez%') //..Donde el apellido cumpla la la expresion "rez"
    //->get();

    //$consulta = empleados::where('sexo','M')->sum('salario'); //Suma el salario de todos los registro de sexo "M"

    //$consulta =empleados::groupBY('sexo') //agrupa por el campo sexo
      //  ->selectRaw('sexo,sum(salario) as salariototal') //Se le dice que muestre el campo sexo y que sume el salario.
      //  ->get();                    //Le damos un alias a la suma del salario con "as salariototal"

    //$consulta =empleados::groupBY('sexo') //agrupa por el campo sexo
      //  ->selectRaw('sexo,count(*) as cantidad') //Se le dice que cuente cuantas registros de cada sexo existen.
      //  ->get();                  //Le damos un alias al conteo total de los registros con "as cantidad"

      //INNER JOIN o JOIN en mariaDB deberíamos obtener todos los registros que tienen vinculo o relación entre ambas tablas;
      //en otras palabras todos los empleados que a su vez estan registrados con un departamento.

      //$consulta = empleados::join('departamentos','empleados.idd','=','departamentos.idd')
      //Estoy diciendo que voy hacer una consulta sobre empleados donde voy hacer una conexion con departamentos
      //->select('empleados.ide','empleados.nombre','departamentos.nombre as depa', 'empleados.edad')
      //Se le pide los campos que se quieren visualizar, de empleados el ide y el nombre.
      //De departamentos se quiere el nombre y se le pone un alias con "as depa" y de empleados se pide la edad.
      //->where('empleados.edad','>=',30)
      //Condicion: donde la edad del empleado sea mayor o igual a 30.
      //Los campos que cumplan esa carectiristicas se mostraran en la vista.
      //->get();

      //$cuantos =count($consulta); //Nos sirve para contar los registros

      $consulta = empleados::where('edad', '>=', 35) //Mostrara los empleados con edad mayor o igual a 35
        ->orwhere('sexo', 'F') //o con de sexo F: Femenino.
        //Es decir mostrara los F aunque no cumplan la condicion de edad.
        ->get();
      return $consulta;
      }



      // AQUI COMIENZA LO RELACIONADO A CRUD

      //AQUI COMIENZA EL CREATE
      public function highemployee(){
        //Calcular la clave del empleado que sigue
        //ascendente de menos a mayor, es deicr 1,2,3,4,5
        //Descendete de mayor a menor, es decir 5,4,3,2,1
        $consulta = empleados::orderBy('ide','DESC')//Que nos mande toda la info de los empleados,
                            //que ordene la informacion de mi consulta por id de empleado y de fomra descendente.
                              ->take(1) //Y que se quede solo con el primer registro.
                              ->get();
        $cuantos= count($consulta);
        //Cuantos rgistros obtuve de mi consulta
        if($cuantos==0){
          //si el valor del ide que trae $cuantos es igual a 0 el valor del ide que sigue ($idesiguiente) sera 1
          $idesiguiente = 1;
        }
        else {
          /*Si no, si $cuantos trae un valor, el valor del ide que sigue ($idesiguiente) sera igual a lo que tengo en mi consulta
          en el primer registro.*/
          $idesiguiente = $consulta[0]->ide + 1;
                        //Mi primer registro, como se trae en un array, el primer registro esta en la posicion 0
                        //De $consulta obtiene el ide del empleado y le suma 1 ("->ide + 1").
        }
        $departamentos =departamentos::orderBy('nombre')->get();
        //Obtiene todos los departamentos y los ordena alfabeticamente.

        return view('altaempleado')
              ->with('idesiguiente',$idesiguiente)
              ->with('departamentos',$departamentos);
              //Eviando valores que se utilizaran en la vista

      }

        //Proceso de guardar empleado
      public function saveemployee(Request $request){
        //Toda la informacion se que teclee en el formulario de altaempleado llegara a esta funcion por medio del $request

        //Validaciones
        $this->validate($request,[
          //los nombres son los de los name de las inputs de la vista.
        'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,Ñ,ñ]+$/',
        'email' => 'required|email',
        'celular' => 'required|regex:/^[0-9]{10}$/',
        'imagen' => 'image|mimes:gif,jpeg,png'
        //'idd' => 'required|numeric'
        ]);

        $file= $request->file('imagen'); //Recibe del formulario la imagen que se va transferir
        if($file<>""){ //Si es valor de $file es distinto a vacio que hagam lo que dice el codigo. (si el usuario selecciono una imagen, que la transfiera)
        $img = $file->getClientOriginalName(); //Obtiene la ruta original de nuestro archivo.
        $foto= $request->ide . $img; //Concatena el id del usuario al nombre de la imagen que se subira.
        \Storage::disk('local')->put($foto, \File::get($file));
        }
        else {
          $foto= "sinfoto.jpg"; //Si no, el valor de la variable $img sea el de la foto (sinfoto.jpg)
        }

        //Se le dice en donde se gurdara la iamgen (en este caso en local, donde se configuro que sea la carpeta archvios dentro de public)
        //Y que va ir a buscar el archivo en donde actualmente esta ubicado.

        //Crea el registro que viene desde el formulario
        $empleados = new empleados; //Aqui nos referimos al modelo
        //Aqui le decimos en que campos de BD se guardara la informacion que viene del la vista(esta viene en el $request).
        //Primer nombre de campo es de BD y el que va despues del reuqest es el name del input de la vista.
        $empleados->ide= $request->ide;
        $empleados->nombre= $request->nombre;
        $empleados->apellido= $request->apellido;
        $empleados->email= $request->email;
        $empleados->celular= $request->celular;
        $empleados->sexo= $request->sexo;
        $empleados->descripcion= $request->descripcion;
        $empleados->imagen= $foto;
        //$empleados->edad= $request->edad;
        //$empleados->salario= $request->salario;
        $empleados->idd= $request->idd;
        $empleados->save();

        //return view('mensajes')
        //->with('proceso', "ALTA DE EMPLEADOS")
        //->with('mensaje',"El emepleado $request->nombre $request->apellido ha sido de alta correctamente");

        //Usando sessiones flash
        Session::flash('mensaje', "El empleado $request->nombre $request->apellido ha sido dado de alta correctamente");
        return redirect()->route('registros');
      }

      //Proceso para mostrar los registros en la vista (tabla)
      public function records(){

        $sessioniduser= session('sesionidusuario'); //sesion-Protegiendo las rutas, no se puede acceder a ello si no esta logueado
        $sessiontipo= session('sesiontipousuario'); //sesion- lo que esta en parentesis viene del Login controler en la funcion validatelogin.
        //Ahi estan creadas las session::put(), la 1,2 y 3.
        if($sessioniduser<>"" and $sessiontipo<>""){ //sesion

        $consulta = empleados::withTrashed()->join('departamentos','empleados.idd','=','departamentos.idd')
        //Estoy diciendo que voy hacer una consulta sobre empleados donde voy hacer una conexion con departamentos
        ->select('empleados.ide','empleados.nombre','empleados.apellido','departamentos.nombre as depa', 'empleados.email', 'empleados.imagen', 'empleados.deleted_at')
        //Se le pide los campos que se quieren visualizar, de empleados el ide, el nombre, apellido, email y deleted_at.
        //De departamentos se quiere el nombre y se le pone un alias con "as depa" y de empleados se pide el email.
        ->orderBy('empleados.nombre') //Ordenara los empleados por nombre de forma ascendente
        ->get();
        //dd($consulta);
        return view('principal')
        ->with('consulta', $consulta)
        ->with('sessiontipo', $sessiontipo); //sesion
        //variable que esta siendo enviada a la vista
      } //sesion
      else { //sesion
        toastr()->warning('Aun no estas logueado','ACCESO DENEGADO'); //sesion
        return redirect('iniciosesion'); //sesion
      } //sesion

      }
      //Desactivar empleado
      public function defuseemployee($ide){
        $empleados= empleados::find($ide); //Le estamos diciendo que el modelo empleados busque el empleado esa $ide
        $empleados->delete(); //Y lo desactive
        toastr()->success('El empleado ha sido desactivado correctamente','Desactivación exitosa');
        return back();

      }
        //Activar empleado
      public function activateemployee($ide){
        empleados::withTrashed()//Reestablece el empleado eliminado logicamente
        ->where('ide',$ide) //Donde el campo ide sea el que viene en la variable $ide, qeu es la que viene de la vista.
        ->restore();
        toastr()->success('El empleado ha sido activado correctamente','Activación exitosa');
        return back();
      }

        //Eliminar empleado
      public function deleteemployee($ide){
        $buscarempleado= nominas::where('ide',$ide)->get();//Se esta pidiendo que vaya a nominas y vea si el ide tiene algun registro en esa tabla
        $cuantos =count($buscarempleado); //Y va contar cuantos son.
        if($cuantos==0) //Si $cuantos es igual a 0 Eliminara el empleado, si es uno o mas no lo hara
        {
          $empleados= empleados::withTrashed()->find($ide) //Busca los empleados, incluidos los eliminados logicamente, especificamnete el registro con el $ide que viene de la vista..
          ->forceDelete(); //Y lo elimina
          toastr()->success('Empleado eliminado correctamente','Eliminación exitosa');
          return back();
        }
        else{
          toastr()->error('El empleado tiene nominas activas','Error al eliminar');
          return back();
        }
      }

      //Editar empleado
      public function editemployee($ide){
        $consulta = empleados::withTrashed()->join('departamentos','empleados.idd','=','departamentos.idd')
        //Estoy diciendo que voy hacer una consulta sobre empleados donde voy hacer una conexion con departamentos
        //Incluidos los empelados eliminados logicamente (Withtrashed)
        ->select('empleados.ide','empleados.nombre','empleados.apellido','empleados.email','empleados.celular',
        'empleados.sexo','departamentos.nombre as depa', 'empleados.descripcion', 'empleados.imagen', 'empleados.idd')
        //Se le pide los campos que se quieren visualizar, de empleados el ide, el nombre, apellido, email y deleted_at.
        //De departamentos se quiere el nombre y se le pone un alias con "as depa" y de empleados se pide el email.
        ->where('ide',$ide) //Donde el id sea igual al $id que viene de la vista.
        ->get();
        $departamentos =  departamentos::all();
        return view('editar_empleado')
        ->with('consulta', $consulta[0]) //Le decimos que toda la consulta viajara a la vista y como solo viajara un registro dentro de un array, pues colocamos que imprimieros la posicion 0
        //El corchete [0] se utiliza cuando solo se manda un registro
        ->with('departamentos', $departamentos);
      }

      //Proceso de guardar edicion
      public function saveedit(Request $request){
        //Validaciones
        $this->validate($request,[
        'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'email' => 'required|email',
        'celular' => 'required|regex:/^[0-9]{10}$/',
        'imagen' => 'image|mimes:gif,jpeg,png'
        //'idd' => 'required|numeric'
        ]);

        $file= $request->file('imagen'); //Recibe del formulario la imagen que se va transferir
        if($file<>""){ //Si es valor de $file es distinto a vacio que haga lo que dice el codigo. (si el usuario selecciono una imagen, que la transfiera)
        $img = $file->getClientOriginalName(); //Obtiene la ruta original de nuestro archivo.
        $foto= $request->ide . $img; //Concatena el id del usuario al nombre de la imagen que se subira.
        \Storage::disk('local')->put($foto, \File::get($file));
        }

        //Edita el registro con el id que viene desde el formulario de edicion
        $empleados = empleados::withTrashed()->find($request->ide); //Aqui nos referimos al modelo
        //Aqui le decimos que busque el registro con  la ide que viene en el $request (incluyendo los eliminados logicamente)
        $empleados->ide= $request->ide;
        $empleados->nombre= $request->nombre;
        $empleados->apellido= $request->apellido;
        $empleados->email= $request->email;
        $empleados->celular= $request->celular;
        $empleados->sexo= $request->sexo;
        $empleados->descripcion= $request->descripcion;
        if($file<>""){ //Si lo que viene el $file es diferente a vacio en BD, en el campo imagen guardara lo de lo que trae la variable $foto
        $empleados->imagen= $foto;
        //Si el usuario no selecciono una foto que no haga nad. y si lo hizo que tome lo que trae la variable $foto
        }
        $empleados->idd= $request->idd;
        $empleados->save();

        //En caso de usar sessionflash
        //Session::flash('mensaje', "El empleado $request->nombre $request->apellido ha sido editado correctamente");
        //return redirect()->route('registros');

        toastr()->success('Los datos del empleado se han modificado correctamente','Modificacion exitosa');
        //return view('principal'); //Redirecciona a una vista
        return redirect('registros'); //Redirecciona a una ruta.

      }

      public function posiciones(){
        $num_list = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);

        $teams = tablaposiciones::orderBy('puntos','desc')
        ->orderBy('dg','asc')//Ordenara los empleados por nombre de forma ascendente
        ->get();

        return view('tablaPosiciones')
        ->with('num_list', $num_list)
        ->with('teams', $teams);







      }





  }
