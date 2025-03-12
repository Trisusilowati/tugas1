@extends('backend.app')

@section('content')
<div class="container-fluid">
    <h3 class="fw-bold mb-3">Halaman Guru</h3>
    <a href="{{ route('teacher.create') }}" class="btn btn-success btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Guru
    </a>

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif

    <form method="GET" action="{{ route('teacher.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Guru..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive" style="max-height: 75vh; overflow-y: auto;">
                <table class="table table-hover table-bordered table-sm text-center small">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $index => $teacher) 
                        <tr>
                            <td>{{ $teachers->firstItem() + $index }}</td>
                            <td class="text-start">{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td><span class="badge bg-primary">{{ $teacher->jabatan }}</span></td>
                            <td class="text-start">{{ $teacher->addres }}</td>
                            <td>
                                @if($teacher->gender == 'male')
                                    <span class="badge bg-info"><i class="fas fa-male"></i> L</span>
                                @else
                                    <span class="badge bg-warning"><i class="fas fa-female"></i> P</span>
                                @endif
                            </td>
                            <td>
                                @if($teacher->status == 'active')
                                    <span class="badge bg-success"><i class="fas fa-check-circle"></i> Aktif</span>
                                @else
                                    <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                @if($teacher->photo)
                                    <img src="{{ url('backend/' . $teacher->photo) }}" alt="Foto Guru" class="img-thumbnail" width="50">
                                @else
                                    <span class="text-muted">Tidak Ada</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($teachers->hasPages())
                <nav>
                    <ul class="pagination justify-content-center">
                        @if ($teachers->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Sebelumnya</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $teachers->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $teachers->lastPage(); $i++)
                            <li class="page-item {{ ($teachers->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $teachers->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($teachers->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $teachers->nextPageUrl() }}" rel="next">Berikutnya</a>
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
