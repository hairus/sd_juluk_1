<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Hp Ayah</th>
            <th>Hp Ibu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $key => $siswa)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ $siswa->kelas->id }}</td>
                <td>{{ $siswa->hpa }}</td>
                <td>{{ $siswa->hpi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
