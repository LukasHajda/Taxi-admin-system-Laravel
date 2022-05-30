@extends('layout.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Prehľady</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                Podrobné prehľady a grafy
                            </li>
                        </ol>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-danger my-color">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cube-outline float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Objednávky</h6>
                                <h4 class="mb-4">{{ sizeof($drives) }}</h4>
                                <span class="ml-2">Celkovo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-buffer float-right"></i>
                            </div>
                            <div class="text-white">
                                @php($summary = 0)
                                @php($count = 0)
                                @php($summaryDistance = 0)
                                @foreach($drives as $drive)
                                    @php($summary += $drive->salary)
                                    @php($summaryDistance += $drive->distance)
                                    @php($count++)
                                @endforeach
                                <h6 class="text-uppercase mb-3">Zisk</h6>
                                <h4 class="mb-4">{{ $summary }} €</h4>
                                <span class="ml-2">Celkovo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-tag-text-outline float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Priemerná obj.</h6>
                                <h4 class="mb-4">{{ $count != 0 ? round($summary / $count, 2) : 0 }} €</h4>
                                <span class="ml-2">Celkovo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-briefcase-check float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Kilometre</h6>
                                <h4 class="mb-4">{{ $summaryDistance }} km</h4>
                                <span class="ml-2">Celkovo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Miesta s najväčším množstvom objednávok</h4>

                            <div class="row text-center m-t-20">
                            </div>

                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Peňažná suma</h4>

                            <div id="morris-bar-stacked" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Využíľnosť áut</h4>

                            <div id="morris-bar-stacked2" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Objednávky</h4>

                            <div class="row text-center m-t-20">
                                <div class="col-4">
                                    <h5 class="">15 000</h5>
                                    <p class="text-muted">Počet objednávok</p>
                                </div>
                                <div class="col-4">
                                    <h5 class="">2 345</h5>
                                    <p class="text-muted">Za minulý rok</p>
                                </div>
                                <div class="col-4">
                                    <h5 class="">243</h5>
                                    <p class="text-muted">Za posledný mesiac</p>
                                </div>
                            </div>

                            <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Posledné transakcie</h4>

                            <div class="table-responsive">
                                <table class="table table-vertical">
                                    <tbody>
                                    <tr>
                                        <th>Zákazník</th>
                                        <th>Stav</th>
                                        <th>Suma</th>
                                        <th>Dátum</th>
                                    </tr>
                                    @for($i = 0; $i < 3; $i++)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('img/user-image.png') }}" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                            Adam Drobný
                                        </td>
                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Zaplatená</td>
                                        <td>
                                            1 215 €
                                        </td>
                                        <td>
                                            05. 12. 2019
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="{{ asset('img/user-image.png') }}" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                            Emil Vysoký
                                        </td>
                                        <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Nezaplatená</td>
                                        <td>
                                            738 €
                                        </td>
                                        <td>
                                            04. 03. 2020
                                        </td>
                                    </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Najnovšie objednávky</h4>

                            <div class="table-responsive">
                                <table class="table table-vertical mb-1">
                                    <tbody>
                                    <tr>
                                        <th>Č. obj.</th>
                                        <th>Zákazník</th>
                                        <th>Stav</th>
                                        <th>Suma</th>
                                        <th>Dátum</th>
                                    </tr>
                                    @for($i = 0; $i < 3; $i++)
                                    <tr>
                                        <td>201900324</td>
                                        <td>
                                            <img src="{{ asset('img/user-image.png') }}" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                            Eva Malá
                                        </td>
                                        <td><span class="badge badge-pill badge-success">Doručená</span></td>
                                        <td>
                                            164 €
                                        </td>
                                        <td>
                                            04. 08. 2019
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>201900324</td>
                                        <td>
                                            <img src="{{ asset('img/user-image.png') }}" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                            Jana Predná
                                        </td>
                                        <td><span class="badge badge-pill badge-primary">Zrušená</span></td>
                                        <td>
                                            212 €
                                        </td>
                                        <td>
                                            18. 03. 2019
                                        </td>
                                    </tr>
                                    @endfor

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/dashboard/dashboard.js') }}" type="text/javascript"></script>
@endsection
