@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-header">
                <div class="box-tittle">
                    <h3>Pengaturan TA</h3>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ url('/ta') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Tahun Ajar</label>
                        <input type="text" class="form-control" name="ta" required>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="smt" class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <button class="btn btn-sm btn-primary"> Simpan</button>
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
                            <th>Tahun Ajar</th>
                            <th>Semester</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tas as $key => $ta)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $ta->ta }}</td>
                                <td>{{ $ta->smt }}</td>
                                <td>
                                    @if ($ta->aktif == 0)
                                        <a href="{{ url('/ta/'.$ta->id)}}">
                                            <button class="btn btn-default btn-sm" type="button" class="btn btn-default">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                    @else
                                        <button class="btn btn-success btn-sm" type="button" class="btn btn-default">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    @endif
                                    <a href="{{ url('/ta/del/'.$ta->id)}}">
                                        <button class="btn btn-danger btn-sm" type="submit" class="btn btn-default">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
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
        $(function() {
            $('#example1').DataTable()
        })
    </script>
@endsection
