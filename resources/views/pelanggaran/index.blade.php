@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-header">
                <div class="box-tittle">
                    <h3>Entry Pelanggaran</h3>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ url('/pelanggaran-siswa') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih Siswa</label>
                        <select name="siswa_id" class="form-control select2" required>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nis }} - {{ $siswa->nama }} -
                                    {{ $siswa->kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Pelanggaran</label>
                        <select name="pelanggaran" id="pelanggaran" class="form-control select2" required>
                            <option value="">-- Pilih Pelanggaran --</option>
                            @foreach ($tatibs as $tatib)
                                <option value="{{ $tatib->id }}">{{ $tatib->pelanggaran }}</option>
                            @endforeach
                        </select>
                        <code id="loading">Loading.....</code>
                    </div>
                    <div id="tampil"></div>
                    <div class="form-group" id="catatan">
                        <label for="">Catatan</label>
                        <textarea type="text" class="form-control" name="catatan"></textarea>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"> Simpan</button>
                </form>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ta</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Pelanggaran</th>
                            <th>Penanganan</th>
                            <th>Catatan</th>
                            <th>Tanggal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggarans as $key => $pel)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pel->tas->ta }}</td>
                                <td>{{ $pel->siswas->nama }}</td>
                                <td>{{ $pel->siswas->kelas->nama_kelas }}</td>
                                <td>
                                    {{ $pel->tatibs->pelanggaran }}
                                </td>
                                <td>
                                    {{ $pel->penanganans->kat }}
                                </td>
                                <td>
                                    {{ $pel->catatan }}
                                </td>
                                <td>
                                    {{ $pel->created_at }}
                                </td>
                                <td>
                                    @if ($pel->guru_id == auth()->user()->id)
                                        <a href="{{ url('/pelanggaran-siswa/del/'.$pel->id)}}">
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </a>
                                    @else
                                        <button class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#loading').hide();
        $('#catatan').hide();
        $('.select2').select2()
        $(function() {
            $('#example1').DataTable()
        });
        $('#pelanggaran').on('change', function() {
            var id = $(this).val();
            $('#loading').show();
            $.ajax({
                url: "/pelanggaran-siswa/getPen",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#loading').hide();
                    $('#catatan').show();
                    $('#tampil').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);

                    $('#loading').hide();
                    $('#penanganan').empty().append(new Option('-- Terjadi kesalahan --', '')).prop(
                        'disabled',
                        true);
                    alert('Gagal mengambil data penanganan. Cek console untuk detail.');
                }
            });
        });
    </script>
@endsection
