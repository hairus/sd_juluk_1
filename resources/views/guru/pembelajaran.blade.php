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
                            <form action="">
                                <div class="form-group">
                                    <label>Pilih Kelas</label>
                                    <select class="form-control" name="kelas_id" id="kelas_id">
                                        <option value="">---</option>
                                        @foreach($kelas as $kls)
                                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
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
                                <div id="tampilKegiatan"></div>
                                <button class="btn btn-sm btn-primary">Simpan</button>
                            </form>
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
        function getCp(){
            $("#ajax-loading-overlay").fadeIn(200);
            let kelas_id = $('#kelas_id').val();
            let mapel_id = $('#mapel_id').val();
            $.ajax({
                url: "{{ url('/guru/getCp') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    kelas_id: kelas_id,
                    mapel_id : mapel_id
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
        function getTp(){
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

        function getKegiatan(){
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

