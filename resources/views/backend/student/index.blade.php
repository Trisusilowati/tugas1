@extends('backend.app')

@section('content')

    <div class="container">
        <h3 class="fw-bold mb-3">Halaman Siswa</h3>
        <a href="{{ route('students.create') }}" class="btn btn-success btn-sm mb-3">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>

        @if(session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                });
            </script>
        @endif

        <!-- Form Search -->
        <form method="GET" action="{{ route('students.index') }}" class="mb-3">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Cari Nama Siswa"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="card-body p-2">
                <div class="table-responsive" style="overflow-x: auto; max-height: 500px;">
                    <table class="table table-hover table-bordered table-sm text-center small">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            @else
                                @foreach ($students as $index => $student)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="text-start">{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td><span class="badge bg-primary">{{ $student->class }}</span></td>
                                        <td class="text-start">{{ $student->addres }}</td>
                                        <td>
                                            @if($student->gender == 'male')
                                                <span class="badge bg-info"><i class="fas fa-male"></i> L</span>
                                            @else
                                                <span class="badge bg-warning"><i class="fas fa-female"></i> P</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($student->status == 'active')
                                                <span class="badge bg-success"><i class="fas fa-check-circle"></i> Aktif</span>
                                            @else
                                                <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($student->photo)
                                                <img src="{{ url('backend/' . $student->photo) }}" alt="Foto Siswa"
                                                    class="img-thumbnail" width="50">
                                            @else
                                                <span class="text-muted">Tidak Ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirmDelete(event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($students->hasPages())
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{-- Tombol Previous --}}
                            @if ($students->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Sebelumnya</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $students->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                                </li>
                            @endif

                            {{-- Nomor Halaman --}}
                            @for ($i = 1; $i <= $students->lastPage(); $i++)
                                <li class="page-item {{ ($students->currentPage() == $i) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            {{-- Tombol Next --}}
                            @if ($students->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $students->nextPageUrl() }}" rel="next">Berikutnya</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Berikutnya</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection