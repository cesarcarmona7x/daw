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
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Precio Base</label>
                            <input type="number" class="form-control" placeholder="Precio Base" name="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input type="file" class="form-control" name="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Tipo de Blockchain</label>
                            <select class="form-control" name="" id="">
                                <option value="Etherium">Etherium</option>
                                <option value="Polygon">Polygon</option>
                                <option value="Klaytn">Klaytn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <select class="form-control" name="" id="">
                                <option value="Art">Art</option>
                                <option value="Changos feos">Changos feos</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection