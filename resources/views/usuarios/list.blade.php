@extends('layouts.base')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Usuarios admin</h2>

            <a class="btn btn-success mb-4" href="{{url('/form')}}">Agregar usuario</a>
            <!-- Mensaje flash-->
            @if(session('usuarioEliminado'))
            <div class="alert alert-success">
            {{session('usuarioEliminado')}}
            </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>email</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->email}}</td>
                        
                        <td>
                            <a href="{{route('editform', $user->id)}}" class="btn btn-primary"
                            title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="submit" onclick="return confirm('¿Eliminar usuario?');" 
                            class="btn btn-danger" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                        
                            <form action="{{route('delete', $user->id)}}" method="POST">
                                @csrf @method('DELETE')
                                
                                
                                
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            {{$users->links()}}
        </div>
    
    </div>

</div>