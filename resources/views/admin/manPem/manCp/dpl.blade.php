<div class="box">
    <div class="box-body">
        <div class="table table-responsive">
            <div class="box-header">
                <div class="box-title">
                    <h3><b>DIMENSI PROFIL PENILAIAN ini perubahan dari git</b></h3>
                </div>
            </div>
            <table id="tableCp" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Dimensi</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dpls as $key => $dpl)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ strtoupper($dpl->dimensi) }}</td>
                        <td>
                            <button class="btn btn-sm btn-success">
                                <i class="fa fa-info"></i>
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

