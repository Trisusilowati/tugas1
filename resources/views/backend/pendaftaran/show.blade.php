@extends('backend.app')

@section('content')
<div class="container">
    <h1 class="fw-bold mb-3 text-center">Detail Pendaftaran</h1>
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Informasi Pendaftar</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $siswa->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td>{{ $siswa->nisn }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Asal Sekolah</th>
                    <td>{{ $siswa->asal_sekolah }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $siswa->nomor_hp }}</td>
                </tr>
                <tr>
                    <th>Alamat Email</th>
                    <td>{{ $siswa->alamat_email }}</td>
                </tr>
                <tr>
                    <th>Jurusan Pilihan</th>
                    <td>
                        {{ $siswa->jurusan_pertama }}
                        @if($siswa->jurusan_kedua) / {{ $siswa->jurusan_kedua }} @endif
                        @if($siswa->jurusan_ketiga) / {{ $siswa->jurusan_ketiga }} @endif
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <form action="{{ route('pendaftaran.update.status', $siswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status" class="form-select">
                                    <option value="Diterima" {{ $siswa->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="Ditolak" {{ $siswa->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('pendaftaran.export.pdf', ['id' => $siswa->id]) }}" class="btn btn-primary mt-3">
        <i class="fas fa-file-pdf"></i> Export PDF
    </a>
    
    <a href="{{ route('pendaftaran') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

@endsection
