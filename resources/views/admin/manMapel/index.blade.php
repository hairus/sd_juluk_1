<div class="box">
    <div class="box-body">
        @include('partial.modal.addMapel')
        <div class="table table-responsive">
            <div class="box-header">
                <div class="box-title">
                    <h3><b>Mapel</b></h3>
                </div>
                <button class="btn btn-sm btn-info pull-right" style="margin: 5px" data-toggle="modal"
                        data-target="#modal-addMapel">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <table id="mapel" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Mapel</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mapels as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->mapel }}</td>
                        <td>
                            <a href="{{ url('/admin/delMapel/'.$data->id) }}">
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
