@extends('dash.layouts.main',['title'=>'Productos'])
@section('contenido')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
        <i class="fa fa-save"></i> Añadir producto
        </button>

        <div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="/admin/productos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre Producto" name="name" id="" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" placeholder="Descripción" name="description" id="" value="{{ old('description')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Precio Base</label>
                                <input type="number" class="form-control" placeholder="Precio Base" name="price" id="" value="{{ old('price') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" class="form-control" name="img" id="" value="{{ old('img') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Tipo de Blockchain</label>
                                <select class="form-control" name="btype" id="" value="{{ old('btype') }}">
                                    <option value="Etherium">Etherium</option>
                                    <option value="Polygon">Polygon</option>
                                    <option value="Klaytn">Klaytn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select class="form-control" name="category" id="" value="{{ old('category') }}">
                                    @foreach ($categorias as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if($message=Session::get('ErrorInsert'))
        <div class="row alert alert-danger alert-dismissable fade show" role="alert">
            <h5 class="col-12">Error: {{$message}}</h5><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <!-- SUCCESS-->
        @if($message=Session::get('Listo'))
            <div class="row alert alert-success fade show">
                <h5 class="col-15"><i class="fa fa-check"></i> Alerta</h5>
                <br><br>
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="row col-12">
            @foreach($nfts as $nft)
                <div class="card col-3">
                    <img class="card-img-top" src="{{ asset('/nfts/'.$nft->img) }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$nft->name}}</h5>
                    <p class="card-text">{{$nft->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection