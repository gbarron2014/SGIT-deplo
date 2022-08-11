@extends('layouts.admin')
@section('title','Editar proveedor')
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
            Edición de proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de proveedores</h4>
                    </div>

                    {!! Form::model($provider,['route'=>['providers.update',$provider], 'method'=>'PUT']) !!}

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$provider->name}}" aria-describedby="helpId" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$provider->email}}" aria-describedby="emailHelpId" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rfc_number">RFC</label>
                        <input type="text" class="form-control @error('rfc_number') is-invalid @enderror" name="rfc_number" id="rfc_number" value="{{$provider->rfc_number}}" aria-describedby="helpId" required>
                        @error('rfc_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{$provider->address}}" aria-describedby="helpId" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Numero de contacto</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$provider->phone}}" aria-describedby="helpId" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('providers.index')}}" class="btn btn-light">
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