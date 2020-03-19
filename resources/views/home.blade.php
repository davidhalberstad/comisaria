@extends('layouts.app')

@section('content')
<div class="panel-body">
        @if(session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
  </div>

    <div class="panel-body">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
  </div>
<!-- DataTables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">



<div class="row">
      <div class="container">
        <table id="denuncias" class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="20%">Apellido</th>
                    <th width="20%">Nombres</th>
                    <th width="20%">Documento</th>
                    <th width="20%">Fecha</th>
                    <th width="20%">Hecho</th>
                    <th width="25%">Opciones</th>
                </tr>
            </thead>

        </table>
      </div>
</div>

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



<!-- Script DataTable -->
<script>
$(document).ready(function() {
    $('#denuncias').DataTable({
        // Ajax donde trae la informacion de la tabla
        "ServerSide": true,
        "ajax": "{{ url('api/denuncias') }}",
        "columns": [
          {data: 'id'},
          {data: 'apellido'},
          {data: 'nombre'},
          {data: 'nro_documento'},
          {data: 'fecha_denuncia'},
          {data: 'tipo_hecho'},
          {data: 'btn'},
        ],
        // Lenguaje en Castellano de la tabla
        "language":{
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
            },
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              },
              "buttons": {
                  "copy": "Copiar",
                  "colvis": "Visibilidad"
              },
        });
});
</script>
@endsection
