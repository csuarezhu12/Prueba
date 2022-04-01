@extends('layout')
@section('content')
<div>
    <div class="row">
        <div class="col col-md-6">
            <p class="text-danger">Lista de Clientes</p>
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->city }}</td>
                    <td>
                        <form action="{{ route('client.destroy',$client->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a class="btn btn-primary" action="{{ route('client.edit',$client->id) }}" onClick="mostrar1(event);">Editar</a>
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
            <form action="{{ route('client.store') }}" method="POST" name='insertar' style="display:none">
                @csrf
                <p class="text-info">Insertar clientes</p>
                <label class="form-label">Nombre</label>
                <input type="text" id="nombre" name="name" class="form-control" />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br><label class="form-label">Ciudad</label><br>
                <select name="city" id="ciudad" class="form-control">
                    <option value="">Lista de Ciudades</option>
                    @foreach($citys as $city)
                    <option value="{{$city->name}}">{{$city->name}}</option>
                    @endforeach

                </select><br>

                @error('city')
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
            <form action="{{ route('client.update',$client->id) }}" method="POST" style="display:none;" name="actualizar">
                @csrf
                @method('PUT')
                <p class="text-info">Editar clientes</p>
                <label class="form-label">Nombre</label>
                <input type="text" id="nombre" name="name" class="form-control" value="{{$client->name}}" />
                @error('nombre')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <br><label class="form-label">Ciudad</label><br>
                <select name="city" id="ciudad" class="form-control">
                    <option value="">Lista de Ciudades</option>
                    @foreach($citys as $city)
                    <option value="{{$city->name}}">{{$city->name}}</option>
                    @endforeach

                </select><br>
                @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-danger">Actualizar</button>
            </form>
        </div>
    </div>
</div>
<br>

{{ $clients->links() }}
@endsection

@section('title','Client')