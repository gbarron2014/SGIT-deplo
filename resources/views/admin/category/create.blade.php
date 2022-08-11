@extends('layouts.admin')
@section('title','Registrar categoría')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de categorías</h4>
                    </div>
                    {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" value="{{ old ('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" value="{{ old ('description') }}"></textarea>
                        <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-light">
                        Cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('src/js/data-table.js') !!}
@endsection