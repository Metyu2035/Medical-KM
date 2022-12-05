<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3 align="center">Data Pasien</h3>
    <table border="1" cellpadding="10" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Gender</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($pasien as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->nama_pasien }}</td>
                        <td>{{ $row->tmp_lahir }}</td>
                        <td>{{ $row->tgl_lahir }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>{{ $row->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</body>
</html>