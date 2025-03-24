<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Three</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col items-center justify-center min-h-screen p-6">

    <!-- WELCOME SECTION -->
    <section class="text-center w-full max-w-3xl mb-10">
        <h1 class="text-4xl font-extrabold text-blue-600 dark:text-blue-400">WELCOME SMA NEGERI  WAY TUBA</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 mt-2">
            Kami menyediakan pendidikan terbaik untuk masa depan cerah. Silakan daftar untuk menjadi bagian dari kami!
        </p>
        
        <!-- Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mt-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                            Register
                        </a>
                    @endif
                @endauth
            @endif

            <a href="{{ route('pendaftaran.create') }}" class="px-5 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                Daftar Siswa
            </a>
        </div>
    </section>

    <!-- FORM PENCARIAN -->
    <div class="w-full max-w-xl">
        <form action="{{ route('search') }}" method="GET" class="flex gap-2">
            <input type="text" name="query" placeholder="Cari Nama atau NISN..." 
                   class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Cari
            </button>
        </form>
    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>
    @endif

</body>
</html>
