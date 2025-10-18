<div class="form-group">
    <label>Pilih Kegiatan Min 3 Kegiatan</label><br>
    @foreach($kegs as $data )
        <div>
            <input type="checkbox" name="row[]" value="{{ $data->id }}"> {{ $data->kegiatan }}
        </div>
    @endforeach
</div>
