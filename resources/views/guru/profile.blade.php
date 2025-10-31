@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="box">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-header">
                                <div class="box-title">
                                    <h3>Profile Guru</h3>
                                    <h4 style="margin-top: 20px">Selamat Datang Guru Hebat.. </h4>
                                    <h4><b>{{ strtoupper(auth()->user()->name) }}</b></h4>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    Pengajar Kelas :
                                    <ul>
                                        @foreach(auth()->user()->gms as $data)
                                            <li>Kelas : {{ $data->kelas->nama_kelas }} {{ $data->mapels->mapel }}</li>
                                        @endforeach

                                    </ul>
                                </li>
                            </ul>
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

