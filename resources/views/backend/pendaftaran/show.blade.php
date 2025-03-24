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
    
    <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#confirmationModal">
        <i class="fas fa-check"></i> Terima / Tolak
    </button>
    
    <a href="{{ route('pendaftaran.export.pdf', $siswa->id) }}" class="btn btn-primary mt-3">
        <i class="fas fa-file-pdf"></i> Export PDF
    </a>
    
    <a href="{{ route('pendaftaran') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>
@endsection
