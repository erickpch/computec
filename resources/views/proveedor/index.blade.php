@extends('layouts.navbar')
@section('nombre', 'Proveedores')
@section('titulo', 'Proveedores')
@section('contenido')



<div class="container">
    <!-- Botón Nuevo --> 
    <div class="alert alert-success" role="alert">
    @if(session('Correcto'))
                <div class="error-message">{{ session('Correcto') }}</div>
    @endif
   </div>

    <div class="right-align">
        <a href="{{ route('ic.proveedor') }}" class="new-button">Nuevo Usuario</a>      
    </div>

    
   
    <!-- Tu tabla aquí -->
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">Id</th>           
            <th class="text-center">Nombre</th>  
            <th class="text-center">Direccion</th>  
            <th class="text-center">Teléfono</th>  
                                  
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datos as $dato) : ?>
            <tr>
              <td><?=  $dato['id'] ?></td>
              <td><?=  $dato['nombre'] ?></td>
              <td><?=  $dato['direccion'] ?></td> 
              <td><?=  $dato['telefono'] ?></td>              

                                                       
              <td>    
                <a id="btnEditar" href="{{ route('iu.proveedor', ['id' => $dato->id]) }}" title="Editar" class="btn btn-success">
                    <i class="fa fa-edit"></i>
                </a>

                <a id="btnEliminar" href="{{ route('d.proveedor', ['id' => $dato->id]) }}" title="Eliminar" class="btn btn-danger">
                  Eliminar
                </a>
                
         


                
              </td>
            </tr>
          <?php endforeach ?>                         
        </tbody>
      </table>
    </div>
  </div>




@endsection