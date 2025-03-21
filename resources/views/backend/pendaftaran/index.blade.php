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
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            </script>
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
                    <th>Status</th>
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
                            <span class="badge {{ $siswa->status == 'Diterima' ? 'bg-success' : ($siswa->status == 'Ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $siswa->status ?? 'Pending' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pendaftaran.show', $siswa->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Detail
                            </a>

                            <a href="{{ route('pendaftaran.edit', $siswa->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $siswa->id }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                            <form id="delete-form-{{ $siswa->id }}" action="{{ route('pendaftaran.destroy', $siswa->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".btn-delete").forEach(button => {
            button.addEventListener("click", function () {
                const siswaId = this.getAttribute("data-id");
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data ini akan dihapus secara permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${siswaId}`).submit();
                    }
                });
            });
        });

        @if(session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        @endif

        @if(session('deleted'))
            Swal.fire({
                title: "Dihapus!",
                text: "{{ session('deleted') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        @endif

        @if(session('updated'))
            Swal.fire({
                title: "Update Berhasil!",
                text: "{{ session('updated') }}",
                icon: "info",
                confirmButtonText: "OK"
            });
        @endif

        @if(session('accepted'))
            Swal.fire({
                title: "Diterima!",
                text: "{{ session('accepted') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        @endif

        @if(session('rejected'))
            Swal.fire({
                title: "Ditolak!",
                text: "{{ session('rejected') }}",
                icon: "error",
                confirmButtonText: "OK"
            });
        @endif
    });
</script>

@endsection
