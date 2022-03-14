@extends('dash.layouts.main',['title'=>'Categorías'])

@section('contenido')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categorías</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
            <i class="fa fa-save"></i> Añadir categoría
            </button>
    
            <div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Agregar Categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="/admin/categorias" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre Categoría" name="name" id="" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" class="form-control" name="img" id="" value="{{ old('img') }}">
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
    </div>
    <div class="row">
        <!-- SUCCESS-->
        @if($message=Session::get('Listo'))
            <div class="row alert alert-success fade show">
                <h5 class="col-12"><i class="fa fa-check"></i> Alerta</h5>
                <br><br>
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="row col-12">
            @foreach($categorias as $categoria)
                <div class="card col-3">
                    <img class="card-img-top" src="{{ asset('/categorias/'.$categoria->img) }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$categoria->category}}</h5>
                    <button class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection