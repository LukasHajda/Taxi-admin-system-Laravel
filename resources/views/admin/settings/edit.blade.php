@extends('layout.admin')

@section('page-title')
    Nastavenia
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Môj profil</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h4 class="mt-0 header-title">Editovať profil</h4>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-reply pr-2"></i>
                                            Späť na úvod
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')

                            <form action="{{ route('settings.update') }}" method="post">
                                @csrf
                                @include('admin.settings._partials._form')

                                @include('admin._partials._buttons')
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
