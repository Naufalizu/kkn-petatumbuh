<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  @vite('resources/css/app.css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

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
            
            <h1 class="text-2xl font-bold text-center mb-4 dark:text-white">Silahkan Login</h1>
            <form action="{{ url('/login') }}" method="POST">
            @csrf
                <!-- Email input dengan ikon orang -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Alamat Email</label>
                    <div class="relative">
                        <input type="text" name ="email" id="email" value="{{ old('email') }}"
                            class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white" placeholder="Your@email.com" required> 
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <!-- Password input dengan ikon mata -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password"  name="password" class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]  placeholder-white text-white" placeholder="Masukkan password" maxlength="20" required>
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 cursor-pointer" onclick="togglePassword()">
                            <i class="fas fa-eye" id="togglePasswordIcon"></i>
                        </span>
                    </div>
                    <a href="{{ url('/cariemail') }}"
                    class="text-xs text-white hover:text-indigo-700 focus:outline-none">Lupa Password?</a>
                </div>

                <button 
                    type="submit" 
                    class="mb-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                    Login
                </button>

                <div class="flex items-center justify-between mb-4">
                    <p class="text-xs text-white">
                        Tidak Punya Akun? 
                        <a href="{{ url('/registrasi') }}" 
                        class="text-indigo-600 hover:text-indigo-700 focus:outline-none">
                        Daftar Sekarang
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Script toggle password -->
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const icon = document.getElementById("togglePasswordIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
    </script>

    @if ($errors->any())
        <script>
        const notyf = new Notyf({
            duration: 2000, // ⏱️ Tertutup otomatis dalam 2 detik
            position: {
            x: 'right',
            y: 'top'
            }
        });

        notyf.error(`{!! implode('<br>', $errors->all()) !!}`);
        </script>
    @endif

</body>
</html>