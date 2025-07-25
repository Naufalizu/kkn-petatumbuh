<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  
  @vite('resources/css/app.css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

</head>
<body>
    <div class="min-h-screen flex items-center justify-center w-full bg-cover bg-center" 
        style="background-image: url('{{ asset('images/alas.jpg') }}');">
        <div class="bg-white/10 backdrop-blur-md shadow-md rounded-lg px-10 py-6 max-w-2xl w-full">
            <h1 class="text-2xl font-bold text-center mb-6 dark:text-white">Registrasi</h1>
            <form  id="registerForm" action="{{ url('/registrasi') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div>
                        <!-- Nama Lengkap -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                    class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white" placeholder="Nama Lengkap" maxlength="30" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Username</label>
                            <div class="relative">
                                <input type="text" name="username" id="username" value="{{ old('username') }}"
                                    class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white" placeholder="Username" maxlength="8" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Alamat Email</label>
                            <div class="relative">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white" placeholder="Your@email.com" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <!-- No Telepon -->
                        <div class="mb-4">
                            <label for="notelp" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Nomor Telepon</label>
                            <div class="relative">
                                <input type="tel" name="notelp" id="notelp" value="{{ old('notelp') }}"
                                    class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white" placeholder="Nomor Telepon" maxlength="16" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white"
                                    placeholder="Masukkan Password" maxlength="20" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 cursor-pointer">
                                    <i class="fas fa-eye toggle-password" data-target="password"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Konfirmasi Password</label>
                            <div class="relative">
                                <input type="password" id="confirmPassword" name="password_confirmation"
                                    class="text-xs shadow-sm rounded-md w-full px-3 py-2 pr-8 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] placeholder-white text-white"
                                    placeholder="Ulangi Password" maxlength="20" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 cursor-pointer">
                                    <i class="fas fa-eye toggle-password" data-target="confirmPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="w-auto px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>

   <script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function () {
        const inputId = this.getAttribute('data-target');
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        // Toggle icon class
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
        });
    });

    // Validasi kesamaan password saat form disubmit
    document.getElementById('registerForm').addEventListener('submit', function (e) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('confirmPassword').value;

        if (password !== confirm) {
        e.preventDefault(); // hentikan form submit
        alert("Password dan Konfirmasi Password tidak cocok!");
        }
    });
    </script>

    @if ($errors->any())
        <script>
        const notyf = new Notyf({
            duration: 2000,
            position: {
            x: 'right',
            y: 'top',
            }
        });

        @foreach ($errors->all() as $error)
            notyf.error("{{ $error }}");
        @endforeach
        </script>
    @endif

</body>
</html>
