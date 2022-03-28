@extends('layout')
@section('content')
<div>
    <div class="row">
        <div class="col col-md-8"></div>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th></th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-success" onClick="mostrar(event);">Insertar</a>
                    <a class="btn btn-primary" action="{{ route('user.edit',$user->id) }}" onClick="mostrar1(event);">Editar</a>
                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
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
    <div class="col col-md-4" id="flotante">
        <div class="col">
            <form action="{{ route('user.store') }}" method="POST" name='insertar' style="display:none">
                @csrf
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
                <input type="password" id="password" name="password" class="form-control" />
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-danger">Insertar</button>
            </form>
        </div>
    </div>
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
<div>
    <div class="row">
        <div class="col col-md-8">
            <form action="{{ route('user.update',$user->id) }}" method="POST" style="display:none;" name="actualizar">
                @csrf
                @method('PUT')
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
                <input type="password" id="password" name="password" class="form-control" value="{{$user->password}}" />
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-danger">Actualizar</button>
            </form>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end">
    {{ $users->links() }}
</div>

@endsection

@section('title','User')