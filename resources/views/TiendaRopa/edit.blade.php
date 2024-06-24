@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Tienda</h2>
    </div>
    <div class="row">
        <form action="{{ route('TiendaRopa.update', $Products->id) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
            @csrf
            @method('PUT')
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $Products->name }}" />
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{ $Products->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $Products->price }}" />
            </div>
           
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $Products->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $Products->stock }}" />
            </div>
            <div class="form-group">
                <label for="images">Imágenes</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple />
                <div class="mt-2">
                    @foreach (json_decode($Products->images, true) ?? [] as $image)
                        <div class="d-inline-block">
                            <img src="{{ asset('storage/' . $image) }}" alt="Imagen del Producto" width="100">
                            <input type="checkbox" name="removed_images[]" value="{{ $image }}"> Eliminar
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection
