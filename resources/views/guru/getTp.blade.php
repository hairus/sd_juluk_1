<div class="form-group">
    <label>Pilih Tujuan Pembelajaran</label>
    <select class="form-control" name="tp" onchange="getDl()" id="tp_id" required>
        <option value="">---</option>
        @foreach($tps as $data)
            <option value="{{ $data->id }}">{{ $data->tp }}</option>
        @endforeach
    </select>
</div>

