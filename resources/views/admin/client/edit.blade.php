@extends('layouts.admin')
@section('title','Editar cliente')
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
            Edición de cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de cliente</h4>
                    </div>

                    {!! Form::model($client,['route'=>['clients.update',$client], 'method'=>'PUT','files' => true]) !!}

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$client->name}}" aria-describedby="helpId" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                            <!-- {{-- <div class="form-group">
                                <label for="rfc_number">RFC</label>
                                <input type="text" class="form-control @error('rfc_number') is-invalid @enderror" name="rfc_number" id="rfc_number" value="{{$client->rfc_number}}" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                                @error('rfc_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div> --}} -->

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{$client->address}}" aria-describedby="helpId">
                        <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono \ Celular</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$client->phone}}" aria-describedby="helpId">
                        <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$client->email}}" aria-describedby="helpId">
                        <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('clients.index')}}" class="btn btn-light">
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
{!! Html::script('src/js/dropify.js') !!}
@endsection