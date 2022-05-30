<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Značka</th>
        <th>Model</th>
        <th>ŠPZ</th>
        <th>Akcia</th>
    </tr>
    </thead>


    <tbody>
    @php($index = 1)
    @foreach($cars as $car)
        <tr>
            <td>{{ $index++ }}</td>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->license_number }}</td>

            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions- $item->id " type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions- $item->id ">
                        <a class="dropdown-item" href="{{ route('cars.edit', $car->id) }}">
                            <i class="fas fa-pencil-alt action-icon"></i>
                            Editovať
                        </a>
                        <form action="{{ route('cars.delete', $car->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Auto - ' . $car->brand . ' ' . $car->model . ' ' . $car->license_number }}" class="delete-button dropdown-item pointer" type="button">
                                <i class="far fa-trash-alt action-icon"></i>
                                Vymazať
                            </button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
