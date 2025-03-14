@extends('backend.app')

@section('content')
    <div class="container-fluid p-4">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Tables</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <h3 class="fw-bold mb-3">Daftar Mata Pelajaran</h3>

                {{-- Tampilkan Notifikasi Jika Berhasil Menghapus --}}
                @if(session('success'))
                    <div id="success-message" data-message="{{ session('success') }}"></div>
                @endif

                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('mapel.create') }}" class="btn btn-success">Tambah Mapel</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered" id="mapel">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 10%; text-align: center;">No</th>
                                    <th style="width: 70%; text-align: center;">Nama</th>
                                    <th style="width: 20%; text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

    @section('script')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                var table = $('#mapel').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('mapel') }}",
                    dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
                    columns: [
                        { data: null, name: 'id', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ],
                    pageLength: 10,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    // scrollY: "400px",
                    // scrollCollapse: true,
                    paging: true,
                    rowCallback: function (row, data, index) {
                        var pageInfo = table.page.info();
                        $('td:eq(0)', row).html(index + 1 + pageInfo.start);
                    }
                });
            });

            function confirmDelete(mapelId) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Mapel akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + mapelId).submit();
                    }
                })
            }
        </script>
    @endsection