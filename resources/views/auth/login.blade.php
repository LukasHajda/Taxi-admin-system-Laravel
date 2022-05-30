@extends('layout.auth')
@section('title', '- Prihlásenie')

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
                    <h4 class="text-muted font-18 m-b-5 text-center">Admin - Prihlásenie</h4>

                    <form action="{{ url('login') }}" method="post" class="form-horizontal m-t-30">
                        @csrf

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="email" type="text" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">

                            @include('admin._partials._errors', ['column' => 'email'])
                        </div>

                        <div class="form-group">
                            <label for="password">Heslo</label>
                            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder="Heslo">

                            @include('admin._partials._errors', ['column' => 'password'])
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox pointer">
                                    <input name="remember" type="checkbox" class="custom-control-input pointer" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label pointer" for="customControlInline">
                                        Zostať prihlásený
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                    Prihlásiť
                                </button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="{{ route('password.request') }}" class="text-muted">
                                    <i class="mdi mdi-lock"></i>
                                    Zabudli ste heslo?
                                </a>
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
