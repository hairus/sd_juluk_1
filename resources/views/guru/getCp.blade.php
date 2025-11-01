<div class="form-group">
    <label>Pilih Capaian Pembelajaran</label>
    <select class="form-control" name="cp" onchange="getTp()" id="cp_id" required>
        <option value="">---</option>
        @foreach($cps as $data)
            <option value="{{ $data->id }}">{{ $data->cp }}</option>
        @endforeach
    </select>
</div>

