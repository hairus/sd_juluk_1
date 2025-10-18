<div class="box">
    <div class="box-body">
        @include('partial.modal.addSiswa')
        <div class="table table-responsive">
            <div class="box-header">
                <div class="box-title">
                    <h3><b>Siswa</b></h3>
                </div>
                <a href="{{ url('/admin/ds') }}">
                    <button class="btn btn-sm btn-primary pull-right" style="margin: 5px">
                        <i class="fa fa-download"></i>
                    </button>
                </a>
                <button class="btn btn-sm btn-info pull-right" style="margin: 5px" data-toggle="modal"
                        data-target="#modal-addSiswa">
                    <i class="fa fa-plus"></i>
                </button>
            </div>

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Hp Ayah</th>
                    <th>Hp Ibu</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($siswas as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nis }}</td>
                        <td>{{ $user->kelas->nama_kelas }}</td>
                        <td>{{ $user->hpa }}</td>
                        <td>{{ $user->hpi }}</td>
                        <td>
                            <a href="{{ url('/admin/delSis/'.$user->id) }}">
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
