@extends('layout')
@section('content')
<div>
    <div class="row">
        <div class="col col-md-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                </tr>
                @foreach ($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->city }}</td>
                    <td>
                        <a class="btn btn-success" onClick="mostrar(event);">Insertar</a>
                        <a class="btn btn-primary" action="{{ route('client.edit',$client->id) }}" onClick="mostrar1(event);">Editar</a>
                        <form action="{{ route('client.destroy',$client->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
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
            <form action="{{ route('client.store') }}" method="POST" name='insertar' style="display:none">
                @csrf
                <label class="form-label">Nombre</label>
                <input type="text" id="nombre" name="name" class="form-control" />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br><label class="form-label">Ciudad</label>
                <input type="text" id="ciudad" name="city" class="form-control" />
                @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-danger">Insertar</button>
            </form>
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
                <form action="{{ route('client.update',$client->id) }}" method="POST" style="display:none;" name="actualizar">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="name" class="form-control" value="{{$client->name}}" />
                    @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><label class="form-label">Ciudad</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{$client->city}}" />
                    @error('correo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-danger">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
    {{ $clients->links() }}
</div>
    @endsection

    @section('title','Client')