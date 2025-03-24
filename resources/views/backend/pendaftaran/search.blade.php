
<div class="container mx-auto px-4 py-8">

    <!-- Hasil Pencarian -->
    @if(isset($students))
        <div>
            <h2 class="text-2xl font-semibold mb-4">Hasil Pencarian:</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border border-gray-300">{{ $student->nama_lengkap }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $student->nisn }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $student->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-2 border border-gray-300 text-center">
                                    Tidak ada data ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>

