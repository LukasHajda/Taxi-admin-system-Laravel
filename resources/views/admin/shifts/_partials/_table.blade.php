<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Deň smeny</th>
        <th>Supervisor</th>
        <th>Suma (€)</th>
        <th>Akcia</th>
    </tr>
    </thead>


    <tbody>
    @php($index = 1)
    @foreach($shifts as $shift)
        <tr>

            <td>{{ $shift->id }}</td>
            <td>{{ Carbon\Carbon::parse($shift->started_at)->format('d F Y') }}</td>
            {{--      Supervisor      --}}
            @php($found = false)
            @foreach($shift->users as $user)
                @if ($user->supervisor == 1)
                    <td>{{ $user->getFullName() }}</td>
                @endif
            @endforeach

            @php($moneySum = 0)
            {{--    Suma        --}}
            @foreach($shift->drives as $drive)
                @php($moneySum += $drive->salary)
            @endforeach
            <td>{{ $moneySum . ' €' }}</td>

            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions- $item->id " type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions- $item->id ">
                        <a class="dropdown-item" href="{{ route('shifts.edit', $shift->id) }}">
                            <i class="fas fa-pencil-alt action-icon"></i>
                            Editovať
                        </a>
                        <form action="{{ route('shifts.delete', $shift->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Smena - ' . $shift->id }}" class="delete-button dropdown-item pointer" type="button">
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
