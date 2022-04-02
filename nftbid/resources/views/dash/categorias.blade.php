@extends('dash.layouts.main',['title'=>'Categorías'])

@section('contenido')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categorías</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
            <i class="fa fa-save"></i> Añadir categoría
            </button>
            <!-- Modal add -->
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
            <!-- Modal update -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalUpdate">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Agregar Categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="/admin/categorias/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" id="idEdit">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre Categoría" name="name" id="nameEdit" value="{{ old('name') }}">
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
            <!-- Modal delete -->
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea eliminar el registro?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" id="doDelete">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($message=Session::get('ErrorInsert'))
            <div class="row alert alert-danger alert-dismissable fade show ml-4" role="alert">
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
            <div class="row alert alert-success alert-dismissable fade show ml-4" role="alert">
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
                    <button class="btn btn-sm btn-danger btnEdit" data-id="{{$categoria->id}}" data-category="{{$categoria->category}}" data-target="#modalUpdate" data-toggle="modal">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger btnEliminar" data-id="{{$categoria->id}}" data-target="#modalDelete" data-toggle="modal">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form action="{{url('/admin/categorias',['id'=>$categoria->id])}}" method="POST" id="formDelete_{{$categoria->id}}">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$categoria->id}}">
                        <input type="hidden" name="_method" value="delete">
                    </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var idEliminar=0;
        var idEditar=0;
        var categoria='';
        $(document).ready(function(){
            $(".btnEliminar").click(function(){
                idEliminar=$(this).data('id');
            });
            $("#doDelete").click(function(){
                $(`#formDelete_${idEliminar}`).submit();
            });
            $(".btnEdit").click(function(){
                idEditar=$(this).data('id');
                categoria=$(this).data('category');
                $('#nameEdit').val(categoria);
                $('#idEdit').val(idEditar);
            });
        });
    </script>
@endsection