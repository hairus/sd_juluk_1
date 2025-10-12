 <div class="form-group">
     <label for="">Penanganan</label>
     <select name="penanganan" class="form-control">
         @foreach ($pens as $pen)
             <option value="{{ $pen->id }}">{{ $pen->kat }}</option>
         @endforeach
     </select>
 </div>
