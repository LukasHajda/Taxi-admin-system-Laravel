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
                        <h4 class="page-title">Zamestnanci</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h2>{{ ($user->operator) ? "Operátor" : ($user->driver) ? "Vodič" : "Supervisor" }}</h2>
                                    <h3 class="mt-0 header-title">Zamestnanec: {{ $user->first_name . ' ' . $user->last_name }}</h3>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('users.index') }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam zamestnancov
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')

                            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.users._partials._form')

                                @include('admin._partials._buttons')
                            </form>

                            <div class="dropdown-divider"></div>

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <h4 class="mt-0 header-title">Profilová fotka</h4>

                                    @if($user->profile_image)
                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="image-wrapper mb-3">
                                                        <img src="{{ asset($user->profile_thumb) }}" class="img-responsive">
                                                        <div class="image-wrapper-back">
                                                            <div class="image-wrapper-back-actions">
                                                                <a href="{{ asset($user->profile_thumb) }}" class="show-icon image-popup-vertical-fit">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                                <form action="{{ $user->images->where('profile', 1)->first() != null ? route('images.delete', $user->images->where('profile', 1)->first()->id) : "" }}" method="post">
                                                                    @csrf
                                                                    <button data-entity="{{ 'Obrázok - ' . ($user->images->where('profile', 1)->first() != null ? $user->images->where('profile', 1)->first()->image : "") }}" class="delete-button delete-icon pointer" type="button">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
