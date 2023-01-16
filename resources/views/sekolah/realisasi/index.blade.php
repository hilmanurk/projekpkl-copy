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
                        <h3>Data Realisasi Kode Rekening</h3>
                        <a href="{{ url('sekolah/realisasi/create') }}" class="btn btn-primary float-end">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <!-- FORM PENCARIAN -->
                        <div class="pb-3">
                            <form class="d-inline-flex bd-highlight" action="{{ url('sekolah/realisasi') }}" method="get">
                                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari tahun ..." aria-label="Search">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Pagu Anggaran Perubahan</th>
                                        <th>Rencana TW I</th>
                                        <th>Realisasi TW I</th>
                                        <th>Selisih TW I</th>
                                        <th>Rencana TW II</th>
                                        <th>Realisasi TW II</th>
                                        <th>Selisih TW II</th>
                                        <th>Rencana TW III</th>
                                        <th>Realisasi TW III</th>
                                        <th>Selisih TW III</th>
                                        <th>Rencana TW IV</th>
                                        <th>Realisasi TW IV</th>
                                        <th>Selisih TW IV</th>
                                        <!-- <th>Saldo</th>
                                        <th>Cek</th> -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $data->firstItem() ?>
                                    @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $row['nisn'] }}</td>
                                        <td class="text-center">{{ $row['nama'] }}</td>
                                        <td class="text-center">{{ $row['tahun'] }}</td>
                                        <td>{{ $row['pagu_anggaran'] }}</td>
                                        <td>{{ $row['rencana_tw1'] }}</td>
                                        <td>{{ $row['realisasi_tw1'] }}</td>
                                        <td>{{ $row['selisih_tw1'] }}</td>
                                        <td>{{ $row['rencana_tw2'] }}</td>
                                        <td>{{ $row['realisasi_tw2'] }}</td>
                                        <td>{{ $row['selisih_tw2'] }}</td>
                                        <td>{{ $row['rencana_tw3'] }}</td>
                                        <td>{{ $row['realisasi_tw3'] }}</td>
                                        <td>{{ $row['selisih_tw3'] }}</td>
                                        <td>{{ $row['rencana_tw4'] }}</td>
                                        <td>{{ $row['realisasi_tw4'] }}</td>
                                        <td>{{ $row['selisih_tw4'] }}</td>
                                        <td>
                                            <a href="{{ url('sekolah/realisasi/'.$row->tahun.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" method="post" action="{{url('sekolah/realisasi/'.$row->tahun)}}">
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