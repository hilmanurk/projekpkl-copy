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
                        <h3>Data Sekolah Wilayah Semarang</h3>
                        <a href="{{ url('admin/data_sekolah/create') }}" class="btn btn-primary float-end">Tambah Sekolah</a>
                    </div>
                    <div class="card-body">
                        <!-- FORM PENCARIAN -->
                        <div class="pb-3">
                            <form class="d-inline-flex bd-highlight" action="{{ url('admin/data_sekolah') }}" method="get">
                                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari nama sekolah ..." aria-label="Search">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Cabdin</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenjang</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $data->firstItem() ?>
                                    @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $row['cabdin'] }}</td>
                                        <td class="text-center">{{ $row['kabupaten/kota'] }}</td>
                                        <td class="text-center">{{ $row['nisn'] }}</td>
                                        <td class="text-center">{{ $row['nama'] }}</td>
                                        <td class="text-center">{{ $row['jenjang'] }}</td>
                                        <td>{{ $row['email'] }}</td>
                                        <td>{{ $row['password'] }}</td>
                                        <td>
                                            <a href="{{ url('admin/data_sekolah/'.$row->nisn.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" method="post" action="{{url('admin/data_Sekolah/'.$row->nisn)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                                <!-- <a href="{{ url('admin/data_sekolah/'.$row->nisn.'/') }}" class="btn btn-danger btn-sm">Hapus</a> -->
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

@endsection