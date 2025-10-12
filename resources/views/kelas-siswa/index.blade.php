@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <form action="{{ url('/kelas-siswa') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <a href="{{ url('/kelas-siswa/1') }}">
                                <button type="button" class="btn btn-danger">Download Template</button>
                            </a>
                            <br>
                            <code>Download Template</code>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Data</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <form action="{{ url('/kelas-siswa/1') }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" type="submit" style="margin: 10px">Hapus Semua Siswa</button>
                </form>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $key => $siswa)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->kelas->nama_kelas }}</td>
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
        $(function() {
            $('#example1').DataTable()
        })
    </script>
@endsection
