<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov</th>
        <th>Typ</th>
        <th>Cena</th>
        <th>Kategória</th>
        <th>Dátum distribúcie</th>
        <th>Akcie</th>
    </tr>
    </thead>


    <tbody>
    @for($i = 1; $i < 101; $i++)
        <tr>
            <td>{{ $i }}</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>24,99 €</td>
            <td>Lorem ipsum</td>
            <td>05. 12. 2019</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{-- $item->id --}}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{-- $item->id --}}">
                        <a class="dropdown-item" href="{{ route('examples.edit') }}">
                            <i class="fas fa-pencil-alt action-icon"></i>
                            Editovať
                        </a>
                        <a class="dropdown-item" href="{{ route('examples.gallery') }}">
                            <i class="far fa-images action-icon"></i>
                            Galéria
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('examples.delete') }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Položka - ' . 'Lorem ipsum' }}" class="delete-button dropdown-item pointer" type="button">
                                <i class="far fa-trash-alt action-icon"></i>
                                Vymazať
                            </button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endfor
    </tbody>
</table>
