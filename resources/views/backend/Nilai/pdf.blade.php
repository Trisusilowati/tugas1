<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-surat h2, .kop-surat p {
            margin: 5px 0;
        }
        .logo {
            width: 80px;
            position: absolute;
            left: 20px;
            top: 10px;
        }
        .garis {
            border-top: 3px solid black;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <!-- <img src="logo.png" class="logo"> Ganti dengan path/logo sekolah -->
        <h2>SMA NEGERI 1 WAY TUBA</h2>
        <p>Jl. Pendidikan No. 123, Jakarta, Indonesia</p>
        <p>Telp: (021) 12345678 | Email: info@smansawaba.ac.id</p>
        <div class="garis"></div>
    </div>

    <h2 style="text-align: center;">Data Nilai</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $data->student->name }}</td>
                    <td>{{ $data->teacher->name }}</td>
                    <td>{{ $data->mapel->name }}</td>
                    <td>{{ $data->nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
