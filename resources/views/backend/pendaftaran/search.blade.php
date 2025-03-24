<!-- Tambahkan Tailwind & Alpine.js -->
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Wrapper Alpine.js -->
@if(isset($students) && count($students) > 0)
    <div x-data="{ open: true }">
        <!-- Modal Pop-up (langsung muncul) -->
        <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Hasil Pencarian</h2>

                <div class="overflow-hidden rounded-lg shadow-md">
                    <table class="w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">NISN</th>
                                <th class="px-4 py-2 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $student->nama_lengkap }}</td>
                                    <td class="px-4 py-2 border">{{ $student->nisn }}</td>
                                    <td class="px-4 py-2 border font-semibold 
                                        {{ $student->status == 'Diterima' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $student->status }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 border text-center text-gray-500">
                                        Tidak ada data ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Kembali -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('welcome') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
