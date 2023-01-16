@extends('admin.admin_master')
@section('admin')

<!-- header area -->
@include('admin.header')
<!-- / header area -->

<!-- sidebar area -->
@include('admin.sidebar')
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Sekolah Wilayah Semarang
                            <!-- <a href="{{ url('admin/data_sekolah/create') }}" class="btn btn-primary text-white float-end">Kembali</a> -->
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/data_sekolah/'.$data->nisn) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @mthod('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Cabdin</label>
                                    <input type="text" name="cabdin" class="form-control" value="CABDIN 1" readonly />
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="">Kabupaten/Kota</label>
                                    <fieldset class="form-group">
                                        <select name="kabkota" id="kabkota" class="form-select" value="{{ $data->kabkota }}" required>
                                            <option selected disabled>Pilih Wilayah</option>
                                            <option value="Kabupaten">Kabupaten Semarang</option>
                                            <option value="Kota">Kota Semarang</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="">Jenjang Sekolah</label>
                                    <fieldset class="form-group">
                                        <select name="jenjang" id="jenjang" class="form-select" value="{{ $data->jenjang }}" required>
                                            <option selected disabled>Pilih Jenjang Sekolah</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                            <option value="SLB">SLB</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">NISN</label>
                                    {{ $data->nisn }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Nama Sekolah</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" value="{{ $data->password }}" required />
                                </div>
                            </div>
                            <!-- <a href="{ url('admin/data_sekolah') }}" class="btn btn-primary">Simpan</a>
                            <a href="{ url('admin/data_sekolah') }}" class="btn btn-secondary">Kembali</a> -->
                            <div class="mb-3 row">
                                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

@endsection