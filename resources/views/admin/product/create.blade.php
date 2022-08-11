@extends('layouts.admin')
@section('title','Registrar producto')
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
      Registro de productos
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h4 class="card-title">Registro de productos</h4>
          </div>
          {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}

          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="helpId" value="{{ old ('name') }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="code">Código de barras</label>
            <input type="text" name="code" id="code" class="form-control">
            <small id="helpId" class="text-muted">Campo opcional</small>
          </div>

          <div class="form-group">
            <label for="sell_price">Precio de venta</label>
            <input type="number" name="sell_price" id="sell_price" class="form-control @error('sell_price') is-invalid @enderror" aria-describedby="helpId" value="{{ old ('sell_price') }}" required>
            @error('sell_price')
            <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="category_id">Categoría</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control @error('provider_id') is-invalid @enderror" name="provider_id" id="provider_id">
              @foreach ($providers as $provider)
              <option value="{{$provider->id}}">{{$provider->name}}</option>
              @endforeach
            </select>
            @error('provider_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>

          <!-- {{--<div class="card-body">
            <h4 class="card-title d-flex">Imagen de producto
              <small class="ml-auto align-self-end">
                <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
              </small>
            </h4>
            <input type="file" name="picture" id="picture" class="dropify" />
          </div> --}} -->

          <button type="submit" class="btn btn-primary mr-2">Registrar</button>
          <a href="{{route('products.index')}}" class="btn btn-light">
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
{!! Html::script('src/js/dropify.js') !!}
@endsection