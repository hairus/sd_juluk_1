@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="box">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="box-title">
                                <h3>Approval</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>CP</th>
                                    <th>TP</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal pembelajaran</th>
                                    <th>Tanggal Create</th>
                                    <th>#</th>
                                    </thead>
                                    <tbody>
                                    @foreach($trx as $key => $t)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $t->users->name }}</td>
                                            <td>{{ $t->kelas->nama_kelas }}</td>
                                            <td>{{ $t->mapels->mapel }}</td>
                                            <td>{{ $t->cps->cp }}</td>
                                            <td>{{ $t->tps->tp }}</td>
                                            <td>{{ $t->kegiatans->kegiatan }}</td>
                                            <td>{{ $t->tgl_pembelajaran }}</td>
                                            <td>{{ $t->created_at }}</td>
                                            <td>
                                                @if($t->approve == 1)
                                                    <a href="{{ url('/ks/unprove/'.$t->id) }}">
                                                        <button class="btn btn-sm btn-success">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </a>
                                                @else
                                                    <a href="{{ url('/ks/approve/'.$t->id) }}">
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="fa fa-info"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

            </div>
        </div>
        @endsection
        @section('script')
            <script>
                $("#ajax-loading-overlay").fadeOut(200);
                $('#example1').DataTable();
                $('#example2').DataTable();
                $('#mapel').DataTable();
                $('#guruMapel').DataTable();
                $('.select2').select2()
            </script>
@endsection

