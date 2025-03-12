@extends('backend.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tambah Student</div>
                        <a href="{{ route('students') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>

                    <div class="card-body" style="max-height: 80vh; overflow-y: auto;">
                        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="addres">Alamat</label>
                                <input id="addres" type="text" class="form-control @error('addres') is-invalid @enderror" name="addres" value="{{ old('addres') }}" required>
                                @error('addres')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="class">Kelas</label>
                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" required>
                                @error('class')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Upload Foto -->
                            <div class="form-group">
                                <label for="photo">Upload Foto</label>
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" accept="image/*">
                                <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB</small>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary px-4">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div> <!-- End card-body -->
                </div> <!-- End card -->
            </div>
        </div>
    </div>
</div>

@endsection
