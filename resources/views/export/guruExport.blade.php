<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($siswas as $key => $siswa)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->email }}</td>
            <td>{{ $siswa->role }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
