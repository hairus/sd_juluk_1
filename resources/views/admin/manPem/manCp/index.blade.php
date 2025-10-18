<div class="box">
    <div class="box-body">
        @include('admin.manPem.modal.addCp')
        @include('admin.manPem.modal.addTp')
        @include('admin.manPem.modal.addKeg')
        <div class="table table-responsive">
            <div class="box-header">
                <div class="box-title">
                    <h3><b>CAPAIAN PEMBELAJARAN</b></h3>
                </div>

                <button class="btn btn-sm btn-info pull-right" style="margin: 5px" data-toggle="modal"
                        data-target="#modal-addKeg">
                     Kegiatan Pembelajaran
                </button>
                    <button class="btn btn-sm btn-primary pull-right" style="margin: 5px"  data-toggle="modal"
                            data-target="#modal-addTp">
                        Tujuan Pembelajaran
                    </button>
                <button class="btn btn-sm btn-warning pull-right" style="margin: 5px" data-toggle="modal"
                        data-target="#modal-addCp">
                    Capaian Pembelajaran
                </button>
            </div>
            <table id="tableCp" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>CP</th>
                    <th>TP</th>
                    <th>Kegiatan</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cps as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->mapels->mapel }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                        <td>{{ $data->tas->smt }}</td>
                        <td>{{ $data->cp }}</td>
                        <td>
                            <ul>
                                @foreach($data->tps as $tp)
                                <li>{{ $tp->tp }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($data->kegiatans as $keg)
                                    <li>{{ $keg->kegiatan }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ url('/admin/delCp/'.$data->id) }}">
                                <button class="btn btn-danger" type="button">
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

