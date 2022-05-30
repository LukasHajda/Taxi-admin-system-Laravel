@extends('layout.admin')

@section('page-title')
    Examples
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Smena</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h2>Smena</h2>
                                    <h3 class="mt-0 header-title">Smena {{ Carbon\Carbon::parse($shift->started_at)->format('d F Y') }}</h3>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('drives.index') }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam objednávok
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')

                            <form action="{{ route('shifts.update', $shift->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.shifts._partials._form')

                                @include('admin._partials._buttons')
                            </form>

                            <div class="dropdown-divider"></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
