<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        {{--    Meno a Priezvisko  Checkbox  --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>
                        Meno
                        <span class="error-color">*</span>
                    </label>
                    <input name="first_name" type="text" id="first_name" value="{{ old("first_name", isset($user) ? $user->first_name : '') }}" class="form-control {{ $errors->has("first_name") ? 'parsley-error' : '' }}" {{ isset($user) ? "readonly" : "" }}>
                    @include('admin._partials._errors', ['column' => "first_name"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>
                        Priezvisko
                        <span class="error-color">*</span>
                    </label>
                    <input name="last_name" id="last_name" type="text" oninput="fillUserName()" data-url="{{ route('users.ajax') }}" value="{{ old("last_name", isset($user) ? $user->last_name : '') }}" class="form-control {{ $errors->has("last_name") ? 'parsley-error' : '' }}" {{ isset($user) ? "readonly" : "" }}>
                    @include('admin._partials._errors', ['column' => "last_name"])
                </div>
            </div>

            @if(isset($user))
                <div class="col">
                <div class="form-group">
                    <label>
                        Upravit priezvisko
                        <span class="error-color">*</span>
                    </label>
                    <input name="last_name_check" onchange="disableLastName()" id="last_name_check" type="checkbox" class="form-control">
                </div>
            </div>
            @endif
        </div>

        {{--    Email a Tel. cislo    --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Email
                        <span class="error-color">*</span></label>
                    <input name="email" type="text" value="{{ old("email", isset($user) ? $user->email : '') }}" class="form-control {{ $errors->has("email") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "email"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Telefonné číslo
                        <span class="error-color">*</span></label>
                    <input name="phone_number" type="text" value="{{ old("phone_number", isset($user) ? $user->phone_number : '') }}" class="form-control {{ $errors->has("phone_number") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "phone_number"])
                </div>
            </div>
        </div>

        {{--   Username a Heslo     --}}
        <div class="row">
            @if(!isset($user))
                <div class="col">
                <div class="form-group">
                    <label>Heslo
                        <span class="error-color">*</span></label>
                    <input name="password" type="password" value="{{ old('password', isset($user) ? $user->password : '') }}" class="form-control {{ $errors->has("password") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "password"])
                </div>
            </div>
            @endif
            <div class="col-4">
                <div class="form-group">
                    <label>Prihlasovacie meno </label>
                    <input name="username" id="username" type="text" value="{{ old("username", isset($user) ? $user->username : '') }}" class="form-control {{ $errors->has("username") ? 'parsley-error' : '' }}" readonly>
                    @include('admin._partials._errors', ['column' => "username"])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label>Rola
                        <span class="error-color">*</span></label>
                    <select class="form-control select2" name="role">
                        @foreach(['Vodič', 'Supervisor', 'Operátor'] as $role)
                            <option value='{{$role}}' {{ isset($givenRole) ? ( strcmp($role, $givenRole) == 0) ? "selected" : "" : ""  }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @include('admin._partials._errors', ['column' => "role"])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Profilový obrázok <b style="color:red">*</b></label>
                    <input name="image" type="file" value="{{ old('image') }}" class="form-control filestyle {{ $errors->has('image') ? 'parsley-error' : '' }}" data-buttonname="btn-secondary">
                    @include('admin._partials._errors', ['column' => 'image'])
                </div>
            </div>
        </div>




    </div>
</div>
