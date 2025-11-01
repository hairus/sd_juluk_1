@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="box">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-header">
                                <div class="box-title">
                                    <h3>Pembelajaran</h3>
                                </div>
                            </div>
                            @if (session('pesan'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <h4><i class="icon fa fa-ban"></i> Maaf!</h4>
                                    {{ session('pesan') }}
                                </div>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form action="{{ url('/guru/sim') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Pilih Tanggal Pembelajaran</label>
                                    <input type="text" name="tgl" class="form-control" id="datepicker" required>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Kelas</label>
                                    <select class="form-control" name="kelas_id" id="kelas_id">
                                        <option value="">---</option>
                                        @foreach($kls as $k)
                                            <option value="{{ $k->kelas_id }}">{{ $k->kelas->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Mapel</label>
                                    <select class="form-control" name="mapel" id="mapel_id" onchange="getCp()">
                                        <option value="">---</option>
                                        @foreach($gms as $gm)
                                            <option value="{{ $gm->mapel_id }}">{{ $gm->mapels->mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="tampilCp"></div>
                                <div id="tampilTp"></div>
                                <div id="tampilDl"></div>
                                <div id="tampilKegiatan"></div>
                                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered" id="tablePem">
                                <thead>
                                <tr>
                                    <td>No</td>
                                    <td>DPL</td>
                                    <td>Mapel</td>
                                    <td>Kelas</td>
                                    <td>CP</td>
                                    <td>TP</td>
                                    <td>Kegiatan</td>
                                    <td>Tanggal Pembelajaran</td>
                                    <td>Action</td>
                                    <td>Status</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pems as $key => $pem)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $pem->dpls->dimensi }}</td>
                                        <td>{{ $pem->mapels->mapel }}</td>
                                        <td>{{ $pem->kelas->nama_kelas }}</td>
                                        <td>{{ $pem->cps->cp }}</td>
                                        <td>{{ $pem->tps->tp }}</td>
                                        <td>{{ $pem->kegiatans->kegiatan }}</td>
                                        <td>{{ $pem->tgl_pembelajaran }}</td>
                                        <td>
                                            <a href="{{ url('/guru/delPem/'.$pem->id) }}">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            </a>
                                        </td>
                                        <td>
                                            @if($pem->approve)
                                                <button class="btn btn-sm btn-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fa fa-info"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div/>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                $('#datepicker').datepicker({
                    autoclose: true
                })
                $('#tablePem').DataTable();
                $("#ajax-loading-overlay").fadeOut(200);

                function getCp() {
                    $("#ajax-loading-overlay").fadeIn(200);
                    let kelas_id = $('#kelas_id').val();
                    let mapel_id = $('#mapel_id').val();
                    $.ajax({
                        url: "{{ url('/guru/getCp') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            kelas_id: kelas_id,
                            mapel_id: mapel_id
                        },
                        success: function (response) {
                            $('#tampilCp').html(response); // tampilkan HTML
                            $("#ajax-loading-overlay").fadeOut(200);
                        },
                        error: function (xhr) {
                            $("#ajax-loading-overlay").fadeOut(200);
                            alert('Terjadi kesalahan!');

                        }
                    });
                }

                function getTp() {
                    $("#ajax-loading-overlay").fadeIn(200);
                    let cp_id = $('#cp_id').val();
                    $.ajax({
                        url: "{{ url('/guru/getTp') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            cp_id: cp_id,
                        },
                        success: function (response) {
                            $('#tampilTp').html(response); // tampilkan HTML
                            $("#ajax-loading-overlay").fadeOut(200);
                        },
                        error: function (xhr) {
                            $("#ajax-loading-overlay").fadeOut(200);
                            alert('Terjadi kesalahan!');

                        }
                    });
                }

                function getDl(){
                    $("#ajax-loading-overlay").fadeIn(200);
                    let cp_id = $('#cp_id').val();
                    let mapel_id = $('#mapel_id').val();
                    $.ajax({
                        url: "{{ url('/guru/getDl') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            cp_id : cp_id,
                            mapel_id : mapel_id
                        },
                        success: function (response) {
                            $('#tampilDl').html(response); // tampilkan HTML
                            $("#ajax-loading-overlay").fadeOut(200);
                        },
                        error: function (xhr) {
                            $("#ajax-loading-overlay").fadeOut(200);
                            alert('Terjadi kesalahan!');

                        }
                    });
                }

                function getKegiatan() {
                    $("#ajax-loading-overlay").fadeIn(200);
                    let cp_id = $('#cp_id').val();
                    $.ajax({
                        url: "{{ url('/guru/getKeg') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            cp_id: cp_id,
                        },
                        success: function (response) {
                            $('#tampilKegiatan').html(response); // tampilkan HTML
                            $("#ajax-loading-overlay").fadeOut(200);
                        },
                        error: function (xhr) {
                            $("#ajax-loading-overlay").fadeOut(200);
                            alert('Terjadi kesalahan!');

                        }
                    });
                }
            </script>
@endsection

