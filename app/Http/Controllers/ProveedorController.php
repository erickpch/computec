<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    
    public function index()
    {
        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');    
        $datos = Proveedor::get();
       
        return view('proveedor.index')->with(compact('persona','permiso','datos'));
    }

    public function indexStore(){

        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');           
      
        return view('proveedor.create')->with(compact('persona','permiso'));
    }

    public function store(Request $request)
    { 
        try {
            DB::transaction(function () use ($request) {
                $elemento = [
                    'nombre' => $request->nombre,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    
                ];              
                $elemento  = Proveedor::create($elemento);
                
            
            }, 3);
        } catch (\Exception $e) {
            
            DB::rollBack();            
       
            return back()->with('error', $e);
        }
        return redirect()->route('r.proveedor')->with('Correcto', 'Elemento Creado');;
    }

    public function indexUpdate($id){
        
        $persona= Cache::get('persona');
        $permiso =Cache::get('rol');        

        $datos = Proveedor::where('id',$id)->first();

        return view('proveedor.update')->with(compact('persona','permiso','datos'));
        
    }

    public function update(Request $request)
    {
        
        try {
            
            DB::transaction(function () use ($request) {
                $update = [
                    'nombre' => $request->nombre,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    
                ];       
                $elemento = Proveedor::where('id',$request->id)->first();
                $elemento->update($update);
                
            
            }, 3);
        } catch (\Exception $e) {
            
            DB::rollBack();            
       
            return back()->with('error', $e);
        }
        return redirect()->route('r.proveedor')->with('Correcto', 'Elemento Modificado');
    
    }


    public function destroy($id)
    {
        $elemento =Proveedor::where('id',$id)->first();
        $elemento->delete();
 
        return redirect()->route('r.proveedor')->with('Correcto', 'Cambios efectuados');

    }
}
