        <!DOCTYPE html>
        <html lang="id">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tambah Pendaftaran</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <style>
                body {
                    background-color: #f8f9fa;
                }

                .container {
                    max-width: 800px;
                    margin-top: 50px;
                }

                .card {
                    border-radius: 10px;
                }

                .btn-success {
                    width: 100%;
                }

                .invalid-feedback {
                    display: none;
                    color: red;
                    font-size: 0.875em;
                }

                .is-invalid {
                    border-color: red;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <h1 class="fw-bold mb-3 text-center">Tambah Pendaftaran</h1>
                <a href="{{ route('pendaftaran') }}" class="btn btn-dark btn-sm mb-3">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form id="pendaftaranForm" action="{{ route('pendaftaran.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap" >
                                </div>
                                <div class="col-md-6">
                                    <label for="nisn" class="form-label fw-bold">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn"  pattern="\d{10}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" >
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" >
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="asal_sekolah" class="form-label fw-bold">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nomor_hp" class="form-label fw-bold">Nomor HP</label>
                                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" 
                                        pattern="\d{10,13}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="alamat_email" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_ayah" class="form-label fw-bold">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" >
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_ibu" class="form-label fw-bold">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" >
                                </div>
                                <div class="col-md-6">
                                    <label for="jurusan_pertama" class="form-label fw-bold">Jurusan pertama</label>
                                    <input type="text" class="form-control" id="jurusan_pertama" name="jurusan_pertama" >
                                </div>
                                <div class="col-md-6">
                                    <label for="jurusan_kedua" class="form-label fw-bold">Jurusan kedua</label>
                                    <input type="text" class="form-control" id="jurusan_kedua" name="jurusan_kedua" >
                                </div>
                                <div class="col-md-6">
                                    <label for="jurusan_ketiga" class="form-label fw-bold">Jurusan ketiga</label>
                                    <input type="text" class="form-control" id="jurusan_ketiga" name="jurusan_ketiga" >
                                </div>

                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>