@extends('layout')
@section('content')
<div>
    <div class="row">
        <div class="col col-md-4">
        <p class="text-danger">Lista de Ciudades</p>
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($citys as $city)
                <tr>
                    <td>{{$city->id}}</td>
                    <td>{{ $city->name }}</td>
                    <td>
                        <form action="{{ route('city.destroy',$city->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a class="btn btn-primary" action="{{ route('city.edit',$city->id) }}" onClick="mostrar1(event);">Editar</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <button type="submit" class="btn btn-success" onClick="mostrar(event);">Insertar</button>
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
        <div class="col col-md-4">
            
                <form action="{{ route('city.store') }}" method="POST" name='insertar' style="display: none;">
                    @csrf
                    <p class="text-info">Insertar Ciudades</p>
                    <label class="form-label">Nombre Ciudad</label>
                    <input type="text" id="nombre" name="name" class="form-control" /><br>
                    @error('name')
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
        <div class="col col-md-4">
                <form action="{{ route('city.update',$city->id) }}" method="POST" style="display:none;" name="actualizar">
                    @csrf
                    @method('PUT')
                    <p class="text-info">Editar Ciudades</p>
                    <label class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="name" class="form-control" value="{{$city->name}}" /><br>
                    @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-danger">Actualizar</button>
                </form>
           
        </div>
    </div>
</div><br>

{{ $citys->links() }}

@endsection

@section('title','Ciudades')