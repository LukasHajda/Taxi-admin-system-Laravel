<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        {{--    Zaciatok smeny  --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>
                        Deň smeny
                        <span class="error-color">*</span>
                    </label>
                    <input name="started_at" style="border: 3px solid #B8B44B" data-provide="datepicker" value="{{ old("started_at", isset($shift) ? Carbon\Carbon::parse($shift->started_at)->format('d-m-y ') : '') }}" class="datepicker {{ $errors->has("started_at") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "started_at"])
                </div>
            </div>
        </div>

        {{--    Supervisor, vodic a operatori    --}}
        <div class="row">
            {{--     Supervisor       --}}
            <div class="col">
                <div class="form-group">
                    <label>Supervisor
                        <span class="error-color">*</span></label>
                    <select class="form-control select2" name="supervisor">
                        @if(isset($shift))
                            @foreach($supervisors as $supervisor)
                                @php($found = false)
                                @foreach($shift->users as $user)
                                    @if($user->supervisor == 1 &&  $user->id == $supervisor->id)
                                        <option value='{{$supervisor->id}}' selected>{{ $supervisor->getFullName() }}</option>
                                        @php($found = true)
                                    @endif
                                @endforeach
                                @if(!$found)
                                    <option value='{{$supervisor->id}}'>{{ $supervisor->getFullName() }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($supervisors as $supervisor)
                                <option value='{{$supervisor->id}}'>{{ $supervisor->getFullName() }}</option>
                            @endforeach
                        @endif
                    </select>
                    @include('admin._partials._errors', ['column' => "driver_id"])
                </div>
            </div>

            {{--      Operatori      --}}
            <div class="col">
                <div class="form-group">
                    <label>Operátori
                        <span class="error-color">*</span></label>
                    <select class="form-control select2-selection--multiple" name="operators[]" multiple="multiple">
                        @if(isset($shift))
                            @foreach($operators as $operator)
                                @php($found = false)
                                @foreach($shift->users as $user)
                                    @if($user->operator == 1 &&  $user->id == $operator->id)
                                        <option value='{{$operator->id}}' selected>{{ $operator->getFullName() }}</option>
                                        @php($found = true)
                                    @endif
                                @endforeach
                                @if(!$found)
                                    <option value='{{$operator->id}}'>{{ $operator->getFullName() }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($operators as $operator)
                                <option value='{{$operator->id}}'>{{ $operator->getFullName() }}</option>
                            @endforeach
                        @endif
                    </select>
                    @include('admin._partials._errors', ['column' => "driver_id"])
                </div>
            </div>

            {{--     Vodici       --}}
            <div class="col">
                <div class="form-group">
                    <label>Vodiči
                        <span class="error-color">*</span></label>
                    <select class="form-control select2-selection--multiple" name="drivers[]" multiple="multiple">
                        @if(isset($shift))
                            @foreach($drivers as $driver)
                                @php($found = false)
                                @foreach($shift->users as $user)
                                    @if($user->driver == 1 &&  $user->id == $driver->id)
                                        <option value='{{$driver->id}}' selected>{{ $driver->getFullName() }}</option>
                                        @php($found = true)
                                    @endif
                                @endforeach
                                @if(!$found)
                                    <option value='{{$driver->id}}'>{{ $driver->getFullName() }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($drivers as $driver)
                                <option value='{{$driver->id}}'>{{ $driver->getFullName() }}</option>
                            @endforeach
                        @endif
                    </select>
                    @include('admin._partials._errors', ['column' => "driver_id"])
                </div>
            </div>
        </div>

        {{--    Meno a auto a smena    --}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group">--}}
{{--                    <label>Smena--}}
{{--                        <span class="error-color">*</span></label>--}}
{{--                    <select class="form-control select2" name="shift_id">--}}
{{--                        @foreach($allShifts as $oneShift)--}}
{{--                            <option value='{{$oneShift->id}}' {{ isset($shift) && $oneShift->id == $shift->id ? "selected" : "" }}>{{ Carbon\Carbon::parse($oneShift->started_at)->format('d F Y') }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @include('admin._partials._errors', ['column' => "driver_id"])--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
