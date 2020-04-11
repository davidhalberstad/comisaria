<a href="{{ route('edit', $id) }}"><i class="fas fa-edit" title="Editar"></i></a>
@if($estado == 1)
<a href="{{ route('print', $id) }}" target="_blank"><i class="fas fa-file-pdf" title="PDF"></i></a>
<a href="{{ route('reporte_denuncia', $id) }}" target="_blank"><i class="fas fa-file-alt" title="Ver Denuncia"></i></a>
<a href="{{ route('editNroPreventivo', $id) }}" ><i class="fas fa-list-ol" title="Asignar Nro Preventivo"></i></a>
<!-- <a href="{{ route('delete', $id) }}"><i class="fas fa-trash-alt" title="Eliminar"></i></a> -->
@endif
