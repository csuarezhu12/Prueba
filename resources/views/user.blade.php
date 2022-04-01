@extends('layout')
@section('content')
<div>
    <div class="row">
        <div class="col col-md-6">
        <p class="text-danger">Lista de Usuarios</p>
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                       
                        <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a class="btn btn-primary" action="{{ route('user.edit',$user->id) }}" onClick="mostrar1(event);">Editar</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <a class="btn btn-success" onClick="mostrar(event);">Insertar</a>
        </div>
  
        <script>
            function mostrar() {
                var frm = document.insertar;
                if (frm.style.display == "block") {
                    frm.style.display = "none"
                } else
                if (frm.style.display == "none") {
                    frm.style.display = "block"
                }
            }
        </script>
        <div class="col col-md-3" id="flotante">
            
                <form action="{{ route('user.store') }}" method="POST" name='insertar' style="display:none">
                    @csrf
                    <p class="text-info">Insertar Usuarios</p>
                    <label class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="name" class="form-control" />
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><label class="form-label">Correo</label>
                    <input type="text" id="Correo" name="email" class="form-control" />
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" /><br>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-danger">Insertar</button>
                </form>
           
        </div>
        <script>
            function mostrar1() {
                var frm = document.actualizar;
                if (frm.style.display == "block") {
                    frm.style.display = "none"
                } else
                if (frm.style.display == "none") {
                    frm.style.display = "block"
                }
            }
        </script>
        <div class="col col-md-3">
            <form action="{{ route('user.update',$user->id) }}" method="POST" style="display:none;" name="actualizar">
                @csrf
                @method('PUT')
                <p class="text-info">Actualizar Usuarios</p>
                <label class="form-label">Nombre</label>
                <input type="text" id="nombre" name="name" class="form-control" value="{{$user->name}}" />
                @error('nombre')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <br><label class="form-label">Correo</label>
                <input type="text" id="Correo" name="email" class="form-control" value="{{$user->email}}" />
                @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="{{$user->password}}" /><br>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-danger">Actualizar</button>
            </form>
        </div>
    </div>
</div><br>


{{ $users->links() }}


@endsection

@section('title','User')