@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Crear un nuevo Categoria</h2>
    </div>
    <div class="row">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
            
           
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection
