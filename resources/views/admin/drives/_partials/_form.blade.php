<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        {{--    Zaciatok a Koniec  --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>
                        Začiatok cesty
                        <span class="error-color">*</span>
                    </label>
                    <input name="place_from" type="text" value="{{ old("place_from", isset($drive) ? $drive->place_from : '') }}" class="form-control {{ $errors->has("place_from") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "place_from"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>
                        Koniec cesty
                        <span class="error-color">*</span>
                    </label>
                    <input name="place_to" type="text" value="{{ old("place_to", isset($drive) ? $drive->place_to : '') }}" class="form-control {{ $errors->has("place_to") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "place_to"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>
                        Telefónne číslo
                        <span class="error-color">*</span>
                    </label>
                    <input name="phone_number" type="text" value="{{ old("phone_number", isset($drive) ? $drive->phone_number : '') }}" class="form-control {{ $errors->has("phone_number") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "phone_number"])
                </div>
            </div>
        </div>

        {{--    Cena a Kilometre    --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Cena (€)
                        <span class="error-color">*</span></label>
                    <input name="salary" type="text" value="{{ old("salary", isset($drive) ? $drive->salary : '') }}" class="form-control {{ $errors->has("salary") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "salary"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Počet kilometrov (km)
                        <span class="error-color">*</span></label>
                    <input name="distance" type="text" value="{{ old("distance", isset($drive) ? $drive->distance : '') }}" class="form-control {{ $errors->has("distance") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "distance"])
                </div>
            </div>
        </div>

        {{--    Meno a auto a smena    --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Meno vodiča
                        <span class="error-color">*</span></label>
                    <select class="form-control select2" name="driver_id">
                        @foreach($drivers as $driver)
                            <option value='{{$driver->id}}' {{ isset($drive)  && $drive->driver->id == $driver->id ? "selected" : "" }}>{{ $driver->first_name . ' ' . $driver->last_name }}</option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => "driver_id"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Počet kilometrov (km)
                        <span class="error-color">*</span></label>
                    <select class="form-control select2" name="car_id">
                        @foreach($cars as $car)
                            <option value='{{$car->id}}' {{ isset($drive)  && $drive->car->id == $car->id ? "selected" : "" }}>{{ $car->brand . ' ' . $car->model  . '(' . $car->license_number . ')'}}</option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => "car_id"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Smena
                        <span class="error-color">*</span></label>
{{--                    <input name="shift_id" type="text" value="{{ old("shift_id", isset($shift) ? Carbon\Carbon::parse($shift->started_at)->format('d F Y') : '') }}" class="form-control {{ $errors->has("shift_id") ? 'parsley-error' : '' }}">--}}
                    <select class="form-control select2" name="shift_id">
                        @foreach($shifts as $shift)
                            <option value='{{$shift->id}}' {{ isset($drive)  && $drive->shift->id == $drive->id ? "selected" : "" }}>{{ Carbon\Carbon::parse($shift->started_at)->format('d F Y')}}</option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => "shift_id"])
                </div>
            </div>
        </div>
    </div>
</div>
