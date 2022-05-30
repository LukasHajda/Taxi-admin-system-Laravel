@extends('layout.auth')
@section('title', '- Verifikácia emailovej adresy')

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
                    <h4 class="text-muted font-18 m-b-5 text-center">Potvrdťe svoju e-mailovú adresu</h4>

                    <div class="card-body">
                        @if(session('resent'))
                            <div class="alert alert-success" role="alert">
                                Práve Vám bol poslaný e-mail s odkazom na potvrdenie registrácie!
                            </div>
                        @endif

                        Prosím skontrolujte si Vašu e-mailovú schránku.
                        <br><br>
                        Pokiaľ ste e-mail nedostali,
                        <a href="{{ route('verification.resend') }}">
                            kliknite SEM pre odoslanie ZNOVU.
                        </a>
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
