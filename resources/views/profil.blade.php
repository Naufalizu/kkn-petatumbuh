<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>

  @vite('resources/css/app.css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>
    <div class="min-h-screen flex items-center justify-center w-full bg-cover bg-center" 
        style="background-image: url('{{ asset('images/alas.jpg') }}');">
        <!-- Konten di sini -->
        <div class="bg-white/10 backdrop-blur-md shadow-md rounded-lg px-10 py-6 max-w-xs w-full">
            {{-- <button type="button"
                onclick="window.location.href='{{ url('/index') }}'"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:outline-none font-medium rounded-full text-xs p-2 text-center inline-flex items-center me-1 mb-4">
                <svg class="w-4 h-4 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                <span class="sr-only">Panah</span>
            </button> --}}
            
            <h1 class="text-2xl font-bold text-center mb-4 dark:text-white">Profil</h1>
            <form action="#" method="GET">
            @csrf
                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Nama Lengkap</label>
                    <div class="relative">
                        <input type="text" name="nama" id="nama" value="{{ $user->nama }}" readonly
                                        class="pointer-events-none text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 placeholder-white text-white">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Username</label>
                    <div class="relative">
                        <input type="text" name="username" id="username" value="{{ $user->username }}" readonly
                                        class="pointer-events-none text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 placeholder-white text-white">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Alamat Email</label>
                    <div class="relative"> 
                        <input type="text" name ="email" id="email" value="{{ $user->email }}" readonly
                            class="pointer-events-none text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 placeholder-white text-white"> 
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <!-- No Telepon -->
                <div class="mb-4">
                    <label for="notelp" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Nomor Telepon</label>
                    <div class="relative">
                        <input type="tel" name="notelp" id="notelp" value="{{ $user->notelp }}" readonly
                                    class="pointer-events-none text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 placeholder-white text-white">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i class="fas fa-phone"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
