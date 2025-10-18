<div class="box">
    <div class="box-body">
        @include('partial.modal.addGm')
        <div class="table table-responsive">
            <div class="box-header">
                <div class="box-title">
                    <h3><b>Guru Mapel</b></h3>
                </div>
                <button class="btn btn-sm btn-info pull-right" style="margin: 5px" data-toggle="modal"
                        data-target="#modal-addGm">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <table id="guruMapel" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($gms as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->users->name }}</td>
                        <td>{{ $data->mapels->mapel }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                        <td>
                            <a href="{{ url('/admin/delGm/'.$data->id) }}">
                                <button class="btn btn-danger btn-sm" type="button">
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
