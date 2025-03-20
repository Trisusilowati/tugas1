@extends('backend.app')

@section('content')
<div class="container">
        <h1 class="fw-bold mb-3 text-center">Halaman Pendaftaran</h1>
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-dark btn-sm mb-3 ms-4">
            <i class="fas fa-plus"></i> Tambah Pendaftaran
        </a>
        <a href="{{ route('pendaftaran.export.pdf') }}" class="btn btn-danger btn-sm mb-3 ms-2">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Asal Sekolah</th>
                <th>Nomor HP</th>
                <th>Alamat Email</th>
                <th>Jurusan Pilihan</th>
                <th style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftaran as $key => $siswa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $siswa->nama_lengkap }}</td>
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->asal_sekolah }}</td>
                    <td>{{ $siswa->nomor_hp }}</td>
                    <td>{{ $siswa->alamat_email }}</td>
                    <td>
                        {{ $siswa->jurusan_pertama }} 
                        @if($siswa->jurusan_kedua) / {{ $siswa->jurusan_kedua }} @endif
                        @if($siswa->jurusan_ketiga) / {{ $siswa->jurusan_ketiga }} @endif
                    </td>
                    <td>
                        <a href="{{ route('pendaftaran.edit', $siswa->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('pendaftaran.destroy', $siswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
