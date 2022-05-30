@extends('layout.auth')
@section('title', '- Zabudnuté heslo')

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
                    <h4 class="text-muted font-18 m-b-5 text-center">Zabudnuté heslo?</h4>
                    <p class="text-muted text-center">Zadajte prosím Váš e-mail pre obnovu zabudnutého hesla.</p>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                Práve Vám bol poslaný e-mail s odkazom na obnovenie hesla!
                            </div>
                        @endif

                        <form action="{{ route('password.email') }}" method="post" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                <label for="email">E-mail <b>*</b></label>
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">

                                @include('admin._partials._errors', ['column' => 'email'])
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                        Obnoviť heslo
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
