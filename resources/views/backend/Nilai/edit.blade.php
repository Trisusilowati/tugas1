@extends('backend.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold mb-3 text-center">Edit Nilai</h1>
        <div class="card shadow-sm ms-4 me-4">
            <div class="card-body">
                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="student_id" class="form-label">Nama Siswa</label>
                        <select class="form-control" name="student_id" id="student_id" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ $nilai->students_id == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="teacher_id" class="form-label">Nama Guru</label>
                        <select class="form-control" name="teacher_id" id="teacher_id" required>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $nilai->teacher_id == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="mapel_id" required>
                            @foreach($mapels as $mapel)
                                <option value="{{ $mapel->id }}" {{ $nilai->mapel_id == $mapel->id ? 'selected' : '' }}>
                                    {{ $mapel->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Nilai</label>
                        <input type="number" class="form-control" name="nilai" id="nilai" value="{{ $nilai->nilai }}" required min="0" max="100">
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('nilai') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection