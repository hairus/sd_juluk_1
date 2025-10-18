<div class="modal fade" id="modal-addCp">
    <div class="modal-dialog">
        <div class="modal-content modal-default">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Capaian Pembelajaran</h4>
            </div>
            <form action="{{ url('/admin/addCp') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Mapel</label>
                        <select class="form-control select2" name="mapel_id" style="width: 100%;">
                            @foreach($mapels as $data)
                                <option value="{{ $data->id }}">{{ $data->mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Kelas</label>
                        <select class="form-control select2" name="kelas_id" style="width: 100%;">
                            @foreach($kelas as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Input CP</label>
                        <textarea type="text" name="cp" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
