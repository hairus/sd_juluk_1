@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-12">
            <div class="col-md-12">
                @include('admin.manPem.manCp.index')
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#tableCp').DataTable();
        $("#ajax-loading-overlay").fadeOut(200);
        function getCp(){
            $("#ajax-loading-overlay").fadeIn(200);
            let smt = $('#smt').val();
            let mapel_id = $('#mapel_id').val();
            let kelas_id = $('#kelas_id').val();
            $.ajax({
                url: "{{ url('/admin/getCp') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    mapel_id: mapel_id,
                    smt : smt,
                    kelas_id : kelas_id
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
        function getCps(){
            // $("#ajax-loading-overlay").fadeIn(200);
            let smt1 = $('#smt1').val();
            let mapel_id1 = $('#mapel_id1').val();
            let kelas_id1 = $('#kelas_id1').val();
            $.ajax({
                url: "{{ url('/admin/getCp') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    mapel_id: mapel_id1,
                    smt : smt1,
                    kelas_id : kelas_id1
                },
                success: function (response) {
                    $('#tampilCp1').html(response); // tampilkan HTML
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
