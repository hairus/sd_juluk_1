<div class="form-group">
    <label> Pilih Dimensi</label>
    <select class="form-control" name="dpl" id="dpl" onchange="getKegiatan()" required>
        <option value="">---</option>
        @foreach($dls as $dl)
            <option value="{{ $dl->id }}">{{ $dl->dimensi }}</option>
        @endforeach
    </select>
</div>
