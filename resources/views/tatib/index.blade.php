@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-header">
                <div class="box-tittle">
                    <h3>Pengaturan Tatib</h3>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ url('/tatib') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Dimensi</label>
                        <select name="dimensi" class="form-control" required>
                            <option value="Sikap Perilaku">Sikap Perilaku</option>
                            <option value="Kedisiplinan">Kedisiplinan</option>
                            <option value="Kerapian">Kerapian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pelanggaran</label>
                        <textarea type="text" class="form-control" name="pelanggaran" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Penanganan</label>
                        <textarea type="text" class="form-control" name="penanganan" required></textarea>
                    </div>
                    <button class="btn btn-sm btn-primary"> Simpan</button>
                </form>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <div class="box-tittle">
                    <h3>Update Tatib</h3>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ url('/tatib/add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Pelanggaran</label>
                        <select class="form-control select2" name="pelanggaran" required>
                            @foreach ($tatibs as $tatib)
                                <option value="{{ $tatib->id }}">{{ $tatib->pelanggaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Penanganan</label>
                        <textarea type="text" class="form-control" name="penanganan" required></textarea>
                    </div>
                    <button class="btn btn-sm btn-success">Tambah Penanganan</button>
                </form>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content modal-danger">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Default Modal</h4>
                            </div>
                            <div class="modal-body">
                                <p>One fine body&hellip;</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dimensi</th>
                            <th>Pelanggaran</th>
                            <th>Penanganan</th>
                            <th>buyik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tatibs as $key => $tatib)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tatib->dimensi }}</td>
                                <td>{{ $tatib->pelanggaran }}</td>
                                <td>
                                    <ul>
                                        @foreach ($tatib->penanganans as $pen)
                                            <li>{{ $pen->kat }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @foreach ($tatib->penanganans as $pen)
                                        <li><button class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button></li>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.select2').select2()
        $(function() {
            $('#example1').DataTable()
        })
    </script>
@endsection
