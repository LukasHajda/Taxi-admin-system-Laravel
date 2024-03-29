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
                        <h4 class="page-title">Vozidlo</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h4 class="mt-0 header-title">Nové vozidla</h4>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('cars.index') }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam vozidiel
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <form action="{{ route('cars.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.cars._partials._form')

                                @include('admin._partials._buttons')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
