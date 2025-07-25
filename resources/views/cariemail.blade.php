<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cari Email</title>

  @vite('resources/css/app.css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

</head>
  <div class="min-h-screen flex items-center justify-center w-full bg-cover bg-center" 
        style="background-image: url('{{ asset('images/alas.jpg') }}');">
        <!-- Konten di sini -->
        <div class="bg-white/10 backdrop-blur-md shadow-md rounded-lg px-10 py-6 max-w-xs w-full">
            {{-- <button type="button"
                onclick="window.location.href='{{ route('login') }}'"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:outline-none font-medium rounded-full text-xs p-2 text-center inline-flex items-center me-1 mb-4">
                <svg class="w-4 h-4 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                <span class="sr-only">Panah</span>
            </button> --}}
            
            <h1 class="text-2xl font-bold text-center mb-4 dark:text-white">Cari Email</h1>
            <form action="{{ route('lupa-password.cari') }}" method="POST">
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

                <button 
                    type="submit" 
                    class="mb-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                    Cari Email
                </button>

            </form>
        </div>
    </div>

    @if (session('error'))
    <script>
        const notyf = new Notyf({
        duration: 1500,
        position: {
            x: 'right',
            y: 'top',
        }
        });

        notyf.error("{{ session('error') }}");
    </script>
    @endif

    @if (session('success'))
    <script>
        const notyf = new Notyf({
        duration: 2000,
        position: {
            x: 'right',
            y: 'top',
        }
        });

        notyf.success("{{ session('success') }}");
    </script>
    @endif

</body>
</html>