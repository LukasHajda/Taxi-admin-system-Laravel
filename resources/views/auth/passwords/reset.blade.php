@extends('layout.auth')
@section('title', '- Obnova zabudnutého hesla')

@section('content')
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center m-0">
                    <a href="https://www.demi.sk/" target="_blank" class="logo logo-admin">
                        <img src="{{ asset('img/Fake_Taxi_logo.svg') }}" height="44" alt="Logo DeMi Studio">
                    </a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Obnova zabudnutého hesla</h4>
                    <p class="text-muted text-center">Zadajte prosím Vaše nové heslo.</p>

                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="post" class="form-horizontal">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email">E-mail <b class="error-color">*</b></label>
                                <input name="email" type="email" value="{{ $email ?? old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">

                                @include('admin._partials._errors', ['column' => 'email'])
                            </div>

                            <div class="form-group">
                                <label for="password">Nové heslo <b class="error-color">*</b></label>
                                <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder="Heslo">

                                @include('admin._partials._errors', ['column' => 'password'])
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Opakujte nové heslo <b class="error-color">*</b></label>
                                <input name="password_confirmation" type="password" class="form-control" id="password-confirm">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                        Potvrdiť
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

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
