<div class="modal fade" id="modal-addKeg">
    <div class="modal-dialog">
        <div class="modal-content modal-default">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Kegiatan Pembelajaran</h4>
            </div>
            <form action="{{ url('/admin/addKegiatan') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Mapel</label>
                        <select class="form-control select2" name="mapel_id" id="mapel_id1" style="width: 100%;" >
                            @foreach($mapels as $data)
                                <option value="{{ $data->id }}">{{ $data->mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Kelas</label>
                        <select class="form-control select2" name="kelas_id1" id="kelas_id1" style="width: 100%;" >
                            @foreach($kelas as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Semester</label>
                        <select class="form-control" name="smt1" id="smt1" style="width: 100%;" onchange="getCps()">
                            <option value="" selected>---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Cp Kegiatan</label>
                        <div id="tampilCp1"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Input Kegiatan</label>
                        <textarea type="text" class="form-control" name="kegiatan" required></textarea>
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
