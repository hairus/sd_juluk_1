@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-12">
            <div class="col-md-6">
                @include('admin.manGuru.index')
            </div>
            <div class="col-md-6">
                @include('admin.manSiswa.index')
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                @include('admin.manMapel.index')
            </div>
            <div class="col-md-6">
                @include('admin.manGuruMapel.index')
            </div>
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

