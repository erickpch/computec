<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use App\Models\User;
use App\Models\Sueldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{


    public function loginIndex(){

        return view('login');
    }


    public function home(){


        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');          
       
        return view('home')->with(compact('persona','permiso'));
    }

    public function loginAttempt(Request $request){
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        // Obtener las credenciales del request
        $credentials = $request->only('email', 'password');
    
        $user = User::where('email', $request->email)->first();

        if ($user) { 
            // Verificar la contraseña utilizando Hash::check
            if (Hash::check($request->password, $user->password)) {
                $userDetails = User::where('email', $request->email)->first();
                
                $rol = $userDetails->rol;
                $guard = '';
    
                switch ($rol) {
                    case "1":
                        $guard = 'administrador';
                        break;
                    case "2":
                        $guard = 'encargado';
                        break;
                    case "3":
                        $guard = 'cajero';
                        break;
                }

                if (Auth::guard($guard)->attempt($credentials)) {
                    
                    Cache::put('rol', $guard);           
                    Cache::put('persona', $userDetails);
                    Auth::attempt($credentials);
                
                    return redirect()->route('home');
                } else {
                    return back()->with('error', 'Las credenciales son incorrectas');
                }
            } else {
                return back()->with('error', 'Las credenciales son incorrectas');
            }
        } else {
            return back()->with('error', 'El correo ingresado no existe');
        }
    }

    public function index()
    {

        
        $datos= Empleado::join('users as u','u.id','empleados.id_usuario')->join('sueldos as s','s.id_empleado','empleados.id')
        ->select('u.id','empleados.nombre','empleados.telefono','u.email','u.rol','s.monto','empleados.id_estado')
        ->get();


        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');    
       
       
        return view('user.index')->with(compact('persona','permiso','datos'));
    }

    public function indexStore(){


        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');    
        $horarios = Horario::get();  
             
      
        return view('user.create')->with(compact('persona','permiso','horarios'));
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $user = [
                    'name' => $request->nombre,
                    'email' => $request->email,
                    'rol' => $request->rol,
                    'password' => Hash::make($request->password)
                ];
              
                $user = User::create($user);
        
                $persona = [
                    'nombre' => $request->nombre,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'profesion' => $request->profesion,
                    'id_horario' => $request->horario,
                    'id_estado' => '1',
                    'id_usuario' => $user->id
                ];
        
                $persona = Empleado::create($persona);
        
                $sueldo = [
                    'monto' => $request->sueldo,
                    'id_empleado' => $persona->id
                ];
                Sueldo::create($sueldo);
        
                // Si todo se ejecutó correctamente, no se necesita hacer nada extra
            }, 3); // Intentos de transacción en caso de fallo
        } catch (\Exception $e) {
            
            DB::rollBack();
            
            // Puedes redirigir a una página de error o realizar alguna acción específica
            return back()->with('error', 'Ocurrió un error durante el proceso');
        }
        return redirect()->route('r.user')->with('Correcto', 'Cuenta Creada');;
    }

    public function indexUpdate($id){

        $datos= Empleado::join('users as u','u.id','empleados.id_usuario')->join('sueldos as s','s.id_empleado','empleados.id')
        ->select('u.id','empleados.nombre','empleados.telefono','u.email','u.rol','s.monto','empleados.id_estado','empleados.profesion'
        ,'empleados.direccion','empleados.id_horario')
        ->where('u.id',$id)
        ->first();

        
        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');    
        $horarios = Horario::get();  
       
        return view('user.update')->with(compact('persona','permiso','datos','horarios'));
    }

    public function update(Request $request)
    {

       
        try {
            DB::transaction(function () use ($request) {
                $user = [
                    'name' => $request->nombre,                    
                    'rol' => $request->rol,
                    'password' => Hash::make($request->password)
                ];
                
                $usuario_update = User::where('id',$request->id);
                $usuario_update->update($user);
                $usuario_update = User::where('id',$request->id)->first();
        
                $persona = [
                    'nombre' => $request->nombre,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'profesion' => $request->profesion,
                    'id_horario' => $request->horario,
                    'id_estado' => '1',
                    'id_usuario' => $usuario_update->id
                ];
              
                $persona_update = Empleado::where('id_usuario',$usuario_update->id);
                $persona_update->update($persona);
                $persona_update = Empleado::where('id_usuario',$usuario_update->id)->first();
              
                $sueldo = [
                    'monto' => $request->sueldo,
                    'id_empleado' => $persona_update->id
                ];

                $sueldo_update = Sueldo::where('id_empleado',$persona_update->id);
                $sueldo_update->update($sueldo);
        
                // Si todo se ejecutó correctamente, no se necesita hacer nada extra
            }, 3); // Intentos de transacción en caso de fallo
        } catch (\Exception $e) {
            
            DB::rollBack();
            
            // Puedes redirigir a una página de error o realizar alguna acción específica
            return back()->with('error', 'Ocurrió un error durante el proceso');
        }
        return redirect()->route('r.user')->with('Correcto', 'Cambios efectuados');
    }


    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $empleado = Empleado::where('id_usuario', $id)->first();
        $sueldo = Sueldo::where('id_empleado', $empleado->id)->first();

        $user->delete();
        $empleado->delete();
        $sueldo->delete();
        return redirect()->route('r.user')->with('Correcto', 'Cambios efectuados');

    }

    public function loginOut(){

        Auth::guard('administrador')->logout();
        Auth::guard('encargado')->logout();
        Auth::guard('cajero')->logout();
        
        return redirect('/');
    }

}
