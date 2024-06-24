@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Crear un nuevo Producto</h2>
    </div>
    <div class="row">
        <form action="{{ route('TiendaRopa.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
            @csrf <!-- Protección contra ataques CSRF -->
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group col-md-4">
                <label for="price">Precio</label>
                <input type="number" class="form-control form-control-sm" id="price" name="price" value="{{ old('price') }}" required />
                @error('price')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="category_id">Categoría</label>
                <select id="category_id" name="category_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="stock">Stock</label>
                <input type="number" class="form-control form-control-sm" id="stock" name="stock" value="{{ old('stock') }}" required />
                @error('stock')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="images">Imágenes</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                @error('images')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection
