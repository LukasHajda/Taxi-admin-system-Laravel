@extends('layout.auth')
@section('title', '- Registrácia')

@section('content')
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="https://www.demi.sk/" target="_blank" class="logo logo-admin">
                        <img src="{{ asset('img/Fake_Taxi_logo.svg') }}" height="44" alt="Demi Studio logo">
                    </a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Registrácia</h4>

                    <form action="{{ route('register') }}" method="post" class="form-horizontal m-t-30">
                        @csrf

                        <div class="form-group">
                            <label for="email">E-mail <b class="error-color">*</b></label>
                            <input name="email" type="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">

                            @include('admin._partials._errors', ['column' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="username">Používateľské meno <b class="error-color">*</b></label>
                            <input name="username" type="text" value="{{ old('username') }}" class="form-control {{ $errors->has('username') ? 'parsley-error' : '' }}" id="username" placeholder="Používateľské meno">

                            @include('admin._partials._errors', ['column' => 'username'])
                        </div>

                        <div class="form-group">
                            <label for="password">Heslo <b class="error-color">*</b></label>
                            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder="Heslo">

                            @include('admin._partials._errors', ['column' => 'password'])
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Opakujte heslo <b class="error-color">*</b></label>
                            <input name="password_confirmation" type="password" class="form-control" id="password-confirm">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="gdpr" name="gdpr" value="1" class="pointer">
                            <label for="gdpr">
                                &nbsp;
                                Súhlasím so spracovaním
                                <a href="javascript:void(0)" target="_blank" class="error-color">
                                    osobných údajov.
                                </a>
                                <b class="error-color">*</b>
                            </label>
                            @include('admin._partials._errors', ['column' => 'gdpr'])
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                    Registrovať
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>
                © {{ \Carbon\Carbon::now()->year }} -
                <a target="_blank" class="d-none d-sm-inline-block">
                    <b>Lukáš Hajda</b>.
                </a>
            </p>
        </div>
    </div>
@endsection

@section('captcha')
    {{-- }}
    <script src="https://www.google.com/recaptcha/api.js?render={sem_vlozte_ID_bez_zatvoriek}"></script>
    {{ --}}
@endsection

@section('js')
    {{-- }}
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{sem_vlozte_ID_bez_zatvoriek}', {action: 'login'}).then(function(token) {
                $('.form-captcha').prepend('<input type="hidden" name="captcha" value="' + token + '">');
            });
        });
    </script>
    {{ --}}
@endsection
