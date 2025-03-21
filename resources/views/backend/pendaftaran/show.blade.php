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
            </table>
        </div>
    </div>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#confirmationModal">
        <i class="fas fa-check"></i> Terima / Tolak
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin menerima atau menolak pendaftaran ini?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('pendaftaran.terima', $siswa->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Terima
                        </button>
                    </form>
                    
                    <form action="{{ route('pendaftaran.tolak', $siswa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menolak siswa ini?')">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-times"></i> Tolak
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('pendaftaran') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>
@endsection
