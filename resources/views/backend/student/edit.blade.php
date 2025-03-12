@extends('backend.app')

@section('content')
<div class="container" style="min-height: 100vh; overflow-y: auto;">
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border rounded-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="card-title mb-0">Edit Siswa</h4>
                    </div>
                    <div class="card-body" style="max-height: 80vh; overflow-y: auto;"> <!-- Container Scrollable -->

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

                        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" onsubmit="confirmUpdate(event)">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="class" name="class" value="{{ $student->class }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="addres" class="form-label">Alamat</label>
                                <textarea class="form-control" id="addres" name="addres" required>{{ $student->addres }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ $student->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <!-- Menampilkan Foto Jika Ada -->
                            <div class="mb-3">
                                <label class="form-label">Foto Siswa</label><br>
                                @if($student->photo)
                                    <img id="previewImage" src="{{ asset('storage/students/' . $student->photo) }}" class="img-thumbnail" width="150">
                                @else
                                    <p class="text-muted">Tidak ada foto</p>
                                @endif
                            </div>

                            <!-- Input untuk Mengunggah Foto Baru -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Ganti Foto (Opsional)</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="previewFile()">
                                <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB</small>
                            </div>

                            <!-- Tombol Submit dan Batal -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <a href="{{ route('students') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>

                    </div> <!-- /card-body -->
                </div> <!-- /card -->
            </div> <!-- /col-md-8 -->
        </div> <!-- /row -->
    </div> <!-- /page-inner -->
</div> <!-- /container -->

<!-- SweetAlert untuk Konfirmasi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmUpdate(event) {
        event.preventDefault();
        let form = event.target;
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data siswa akan diperbarui!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Update!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }

    function previewFile() {
        const preview = document.getElementById('previewImage');
        const file = document.getElementById('photo').files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
