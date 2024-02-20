@can('Ver Tipo Monedas')
    <a href="{{ route('tipoMonedas.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-sm btn-outline-secondary'>
        <i class="fa fa-eye"></i>
    </a>
    @endcan

@can('Editar Tipo Monedas')
    <a href="{{ route('tipoMonedas.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-sm btn-outline-info'>
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('Eliminar Tipo Monedas')
    <a href="#" onclick="deleteItemDt(this)" data-id="{{ $id }}" data-toggle="tooltip" title="Eliminar" class='btn btn-sm btn-outline-danger'>
        <i class="fa fa-trash-alt"></i>
    </a>


    <form action="{{ route('tipoMonedas.destroy', $id) }}" method="POST" id="delete-form{{ $id }}">
        @method('DELETE')
        @csrf
    </form>
@endcan

