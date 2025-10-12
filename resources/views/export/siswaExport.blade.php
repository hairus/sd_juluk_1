<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $key => $siswa)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
