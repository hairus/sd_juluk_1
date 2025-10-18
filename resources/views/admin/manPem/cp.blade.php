<select class="form-control select2" name="cp" id="cp_id" style="width: 100%;">
    <option value="">---</option>
    @foreach($cps as $data)
    <option value="{{ $data->id }}">{{ $data->cp }}</option>
    @endforeach
</select>
@section('script')
    <script>
        $('.select2').select2()
    </script>
@endsection
