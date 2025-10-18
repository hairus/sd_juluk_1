<div class="form-group">
    <label>Pilih Tujuan Pembelajaran</label>
    <select class="form-control" name="tp" onchange="getKegiatan()" id="tp_id">
        <option value="">---</option>
        @foreach($tps as $data)
            <option value="{{ $data->id }}">{{ $data->tp }}</option>
        @endforeach
    </select>
</div>

