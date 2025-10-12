@extends('layouts.app')

@section('content')
    <div class="contents">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-tittle">
                        Kelas
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ url('/kelas') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Create Kelas *</label>
                            <input type="text" class="form-control" name="kelas" required />
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-tittle">
                        View Kelas
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kelas as $key => $kls)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $kls->id }}</td>
                                <td>{{ $kls->nama_kelas }}</td>
                                <td>
                                    <form action=" {{ url('/kelas/'. $kls->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="text" value="{{ $kls->id }}" hidden="">
                                    <button class="btn btn-danger btn-sm rounded-2xl"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
@endsection
