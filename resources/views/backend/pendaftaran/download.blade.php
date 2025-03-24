<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran</title>
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 20px;
            background-color: #ffffff;
        }

        .header {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }

        th {
            width: 50%;
            
        }

        td {
            width: 50%;
            
        }
    </style>
</head>

<body>
    <div class="header">
        PEMERINTAH BANDAR LAMPUNG <br>
        DINAS PENDIDIKAN <br>
        SMK NEGERI 1 BANDAR LAMPUNG<br>
        Jalan Jenderal Ahmad Yani No. 1 Kota Bandar Lampung <br>
        NPSN : 3456765432 &nbsp;&nbsp; NSS : 23456789876543
    </div>
    <div class="container">
        <h2 class="text-left">Formulir Pendaftaran</h2>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $pendaftaran->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>NISN</th>
                <td>{{ $pendaftaran->nisn }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $pendaftaran->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pendaftaran->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pendaftaran->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Asal Sekolah</th>
                <td>{{ $pendaftaran->asal_sekolah }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $pendaftaran->nomor_hp }}</td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td>{{ $pendaftaran->nama_ayah }}</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>{{ $pendaftaran->nama_ibu }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $pendaftaran->alamat_email }}</td>
            </tr>
        </table>
    </div>

    <div class="container">
        <h2 class="text-left">Jurusan</h2>
        <table>
            <tr>
                <th>Jurusan Pertama</th>
                <td>{{ $pendaftaran->jurusan_pertama }}</td>
            </tr>
            <tr>
                <th>Jurusan Kedua</th>
                <td>{{ $pendaftaran->jurusan_kedua }}</td>
            </tr>
            <tr>
                <th>Jurusan Ketiga</th>
                <td>{{ $pendaftaran->jurusan_ketiga }}</td>
            </tr>
        </table>
    </div>
    <p >Terima kasih telah mendaftar di SMK Negeri 1 Bandar Lampung</p>
</body>

</html>