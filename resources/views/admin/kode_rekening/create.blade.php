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
        <strong>{{ session::get('error')}}</strong>
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
                        <h3>Kode Rekening Sekolah Wilayah Semarang</h3>
                    </div>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Kabupaten/Kota</label>
                                    <fieldset class="form-group">
                                        <select name="kabkota" id="kabkota" class="form-select" required>
                                            <option selected disabled>Pilih Wilayah</option>
                                            <option value="kab">Kabupaten Semarang</option>
                                            <option value="kota">Kota Semarang</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Jenjang</label>
                                    <fieldset class="form-group">
                                        <select name="jenjang" id="jenjang" class="form-select" required>
                                            <option selected disabled>Pilih Jenjang Sekolah</option>
                                            <option value="sma">SMA</option>
                                            <option value="smk">SMK</option>
                                            <option value="slb">SLB</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Kode Rekening</label>
                                    <input type="tel" name="nisn" class="form-control" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Keterangan Kode Rekening</label>
                                    <input type="text" name="nisn" class="form-control" required />
                                </div>
                            </div>
                            <button class="btn btn-primary float-end" type="submit">Simpan</button>
                            <button class="btn btn-danger float-end" type="submit">Batal</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

@endsection