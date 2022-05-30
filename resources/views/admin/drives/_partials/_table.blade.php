<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Začiatok cesty</th>
        <th>Koniec cesty</th>
        <th>Telefónne číslo</th>
        <th>Cena (€)</th>
        <th>Počet kilometrov (km)</th>
        <th>Meno vodiča</th>
        <th>Smena</th>
        <th>Auto</th>
        <th>Akcia</th>
    </tr>
    </thead>


    <tbody>
    @php($index = 1)
    @foreach($drives as $drive)
        <tr>
            <td>{{ $index++ }}</td>
            <td>{{ $drive->place_from }}</td>
            <td>{{ $drive->place_to }}</td>
            <td>{{ $drive->phone_number }}</td>
            <td>{{ $drive->salary }} €</td>
            <td>{{ $drive->distance }} km</td>
            <td>{{ $drive->driver->first_name . ' ' . $drive->driver->last_name }}</td>
            <td>{{ Carbon\Carbon::parse($drive->shift->started_at)->format('d F Y')  }}</td>
            <td>{{ $drive->car->brand . ' ' . $drive->car->model }}</td>

            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions- $item->id " type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions- $item->id ">
                        <a class="dropdown-item" href="{{ route('drives.edit', $drive->id) }}">
                            <i class="fas fa-pencil-alt action-icon"></i>
                            Editovať
                        </a>
                        <form action="{{ route('drives.delete', $drive->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Objednávka - ' . $drive->id }}" class="delete-button dropdown-item pointer" type="button">
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
