@extends('sekolah.sekolah_master')
@section('sekolah')

<!-- header area -->
@include('sekolah.header')
<!-- / header area -->

<!-- sidebar area -->
@include('sekolah.sidebar')
<!-- /sidebar Area-->

<div class="content_wrapper">
    <!--middle content wrapper-->

    @if(Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session::get('error')}}</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="middle_content_wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 text-bold">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div><br>
        <div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Pilih Tahun</option>
                <option value="1">2021</option>
                <option value="2">2022</option>
                <option value="3">2023</option>
            </select>
        </div><br>
        <!-- table area -->
        <div class="main-panel">
            <!-- card area -->
            <div class="row">
                <!-- Alokasi Murni -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Alokasi Murni </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp1.400.000.000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alokasi Tanpa Silpa -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Alokasi Tanpa Silpa</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp1.400.000.000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alokasi Silpa -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Alokasi Silpa
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp1.400.000.000</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Pagu 1 Tahun -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pagu 1 Tahun
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp1.400.000.000</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Cek Saldo Perubahan</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                    <h6 class="text-muted mb-0">Rp</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pengecekan</h4>
                        </div>
                        <div class="card-content pb-4">
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <!-- <img class="img-timbangan" src="{{ asset('panel/assets/images/timbangan.png') }}"> -->
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Cek Pagu Perubahan dan Murni</h5>
                                    <h6 class="text-muted mb-0">Rp</h6>
                                </div>
                            </div>
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <!-- <img src="assets/images/dollar.jpg"> -->
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Cek Realisasi</h5>
                                    <h6 class="text-muted mb-0">Rp</h6>
                                </div>
                            </div>
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <!-- <img src="assets/images/faces/1.jpg"> -->
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Cek Saldo</h5>
                                    <h6 class="text-muted mb-0">Rp</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

<!-- footer area -->
<!-- / footer area -->

@endsection