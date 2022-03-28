@extends('layout')
@section('content')
<div>
    <div class="row">
        <div class="col col-md-8"></div>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
            @foreach ($citys as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{ $city->name }}</td>
                <td>
                    <button type="submit" class="btn btn-success">Insertar</button>
                    <a class="btn btn-primary" action="{{ route('city.edit',$city->id) }}" onClick="mostrar1(event);">Editar</a>
                    <form action="{{ route('city.destroy',$city->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="col col-md-4" id="flotante" style="display:none;">
    <div class="col">
        <form action="{{ route('city.store') }}" method="POST" class='insertar'>
            @csrf
            <label class="form-label">Nombre Ciudad</label>
            <input type="text" id="nombre" name="name" class="form-control" />
            @error('name')
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
            <form action="{{ route('city.update',$city->id) }}" method="POST" style="display:none;" name="actualizar">
                @csrf
                @method('PUT')
                <label class="form-label">Nombre</label>
                <input type="text" id="nombre" name="name" class="form-control" value="{{$city->name}}" />
                @error('nombre')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <button class="btn btn-danger">Actualizar</button>
            </form>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end">
    {{ $citys->links() }}
</div>
@endsection

@section('title','City')