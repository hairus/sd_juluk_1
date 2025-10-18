<div class="box">
    <div class="box-body">
        @include('partial.modal.import')
        @include('partial.modal.addGuru')
        @include('partial.modal.editGuru')
        <div class="table table-responsive">
            <div class="box-header">
                <div class="box-title">
                    <h3><b>Guru</b></h3>
                </div>
                <a href="{{ url('/admin/dg') }}">
                    <button class="btn btn-sm btn-primary pull-right" style="margin: 5px">
                        <i class="fa fa-download"></i>
                    </button>
                </a>
                <button class="btn btn-sm btn-info pull-right" style="margin: 5px" data-toggle="modal"
                        data-target="#modal-addGuru">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ strtoupper($user->role) }}</td>
                        <td>
                            <a href="{{ url('/admin/del/'.$user->id) }}">
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
