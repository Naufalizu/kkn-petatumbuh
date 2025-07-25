<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <script src="//unpkg.com/alpinejs" defer></script>
  <style>
    #kondisi_cuaca option {
        background-color: #1f2937; 
    }
  </style>

  <style>
    #penyiraman option {
        background-color: #1f2937; 
    }
  </style>

  <style>
    .scrollbar-hide::-webkit-scrollbar {
    display: none;
    }
  </style>

  @vite('resources/css/app.css')

  <script src="https://cesium.com/downloads/cesiumjs/releases/1.120/Build/Cesium/Cesium.js"></script>
  <link href="https://cesium.com/downloads/cesiumjs/releases/1.120/Build/Cesium/Widgets/widgets.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
        /* Tambahkan di file CSS kamu */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;     /* Firefox */
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;             /* Chrome, Safari, Opera */
        }
    </style>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

  <title>PetaTumbuh</title>
</head>

<body>
  <section 
        id="home" 
        class="flex justify-center items-center min-h-screen" 
        style="background-image: url('{{ asset('images/alas.jpg') }}'); background-size: cover; background-position: center;">

        <div class="bg-white/20 w-[85%] max-h-[90vh] border border-black/20 shadow-inner shadow-white/10 rounded-[30px] backdrop-blur-lg overflow-hidden px-4 sm:px-10 py-6 relative">
            <!-- Wadah scroll -->
            <div class="flex justify-center mb-8">
                <div class="w-full max-h-[70vh] overflow-y-auto px-1">
                    <div class="grid grid-cols-1 gap-4">
                    <!-- Baris 1 -->
                    <div class="flex items-center justify-between min-h-[70px] text-white px-0">
                        <!-- Kolom 1 (30%) -->
                        <div class="w-[30%] flex items-start justify-start">
                            <h2 class="text-left text-3xl font-bold">
                                <span class="text-white">PETA</span><span class="text-[#8bc34a]">TUMBUH</span>
                            </h2>
                        </div>

                        <!-- Kolom 2 (60%) -->
                        <div class="w-[60%] flex items-center justify-center">
                            <div class="hidden lg:block">
                                <ul class="flex space-x-10 text-md font-semibold text-black/60 dark:text-white">
                                    <li
                                        class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                        <a href="#">Home</a>
                                    </li>

                                    <li 
                                        class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                        <a href="#tentang" onclick="event.preventDefault(); document.getElementById('tentang').scrollIntoView({ behavior: 'smooth' });">
                                            Tentang
                                        </a>
                                    </li>

                                    <li
                                        class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                        <a href="#pemetaan" onclick="event.preventDefault(); document.getElementById('pemetaan').scrollIntoView({ behavior: 'smooth' });">
                                            Pemetaan
                                        </a>
                                    </li>
                                    <li
                                        class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                        <a href="#pemantauan" onclick="event.preventDefault(); document.getElementById('pemantauan').scrollIntoView({ behavior: 'smooth' });">
                                            Pemantauan
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Kolom 3 (30%) -->
                        <div class="w-[30%] flex justify-end py-0">
                            @guest
                                <div class="hidden lg:flex lg:items-center py3 gap-x-2">
                                    <button 
                                        class="flex justify-center items-center px-6 py-2 border-2 border-white rounded-3xl text-sm font-bold text-white bg-transparent cursor-pointer transition duration-300 hover:bg-[#8bc34a] hover:border-[#8bc34a] focus:outline-none"
                                        onclick="window.location.href='{{ url('/registrasi') }}'">
                                        Registrasi
                                    </button>
                                    <button 
                                        class="flex justify-center items-center px-6 py-2 border-2 border-white rounded-3xl text-sm font-bold text-white bg-transparent cursor-pointer transition duration-300 hover:bg-[#8bc34a] hover:border-[#8bc34a] focus:outline-none"
                                        onclick="window.location.href='{{ url('/login') }}'">
                                        Login
                                    </button>
                                </div>
                            @endguest

                            @auth
                                <div class="hidden lg:block">
                                    <div x-data="{ open: false }" class="bg-white backdrop-blur-md rounded-full sm:w-fit md:max-w-[470px] py-3 px-4 text-white relative">
                                        <div class="flex items-center space-x-5">
                                            <div class="user-info pl-2">
                                                <span class="user-name text-md text-black font-semibold">Halo, {{ Auth::user()->username }}</span>
                                                <div class="user-status text-xs">
                                                    <span class="status-dot"></span>
                                                    <div class="relative inline-flex">
                                                        <div class="w-2 h-2 bg-[#8bc34a] rounded-full"></div>
                                                        <div class="w-2 h-2 bg-[#8bc34a] rounded-full absolute top-0 left-0 animate-ping"></div>
                                                        <div class="w-2 h-2 bg-[#8bc34a] rounded-full absolute top-0 left-0 animate-pulse"></div>
                                                    </div>
                                                    <span class="status-text ml-1 text-black font-semibold">Online</span>
                                                </div>
                                            </div>
                                            <div class="relative pr-0 mr-0">
                                                <div 
                                                    @click="open = !open"
                                                    class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 transition-all duration-300 transform hover:scale-110 flex items-center justify-center text-white font-bold text-2xl cursor-pointer">
                                                    {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                                                </div>
                                            </div>

                                            <!-- Overlay kotak kecil -->
                                            <div
                                                x-show="open"
                                                @click.away="open = false"
                                                x-transition
                                                class="absolute top-18 right-0 w-31 bg-white rounded-2xl shadow-xl border border-gray-200 z-50 overflow-hidden">
                                                <ul class="flex flex-col divide-y divide-gray-200 text-black">
                                                    <li>
                                                        <a 
                                                            href="{{ url('/profil') }}"
                                                            class="flex items-center gap-2 px-6 py-3 text-sm hover:bg-blue-100 hover:text-blue-600 transition-colors duration-200 font-medium">
                                                            <span class="text-sm">👤</span> <span>Profil</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <!-- Tombol Logout -->
                                                        <a 
                                                            href="#" 
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                            class="flex items-center gap-2 px-6 py-3 text-sm hover:bg-red-100 hover:text-red-600 transition-colors duration-200 font-medium">
                                                            <span class="text-sm">🚪</span> <span>Keluar</span>
                                                        </a>

                                                        <!-- Form Logout Tersembunyi -->
                                                        <form id="logout-form" action="/logout" method="POST" class="hidden">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endauth

                            <!-- Wrapper navigasi + tombol -->
                            <div x-data="{ open: false }" class="relative">

                                {{-- Tombol menu untuk mobile --}}
                                <div class="flex items-center justify-center lg:hidden">
                                    <button @click="open = !open" class="focus:outline-none text-slate-200 dark:text-white">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-2xl text-slate-800 dark:text-white focus:outline-none active:scale-110 active:text-[#8bc34a]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Overlay kotak kecil -->
                                <div
                                    x-show="open"
                                    @click.away="open = false"
                                    x-transition
                                    class="absolute top-12 right-0 w-45 bg-white rounded-2xl shadow-xl border border-gray-200 z-50 overflow-hidden">
                                    <ul class="flex flex-col divide-y divide-gray-200 text-black">
                                        <li>
                                            <a 
                                                href="#home" 
                                                onclick="event.preventDefault(); document.getElementById('home').scrollIntoView({ behavior: 'smooth' });"
                                                class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium">
                                                🏠 Home
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="#tentang" 
                                                onclick="event.preventDefault(); document.getElementById('tentang').scrollIntoView({ behavior: 'smooth' });"
                                                class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium"
                                            >
                                                📖 Tentang
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="#pemetaan" 
                                                onclick="event.preventDefault(); document.getElementById('pemetaan').scrollIntoView({ behavior: 'smooth' });"
                                                class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium"
                                            >
                                                🗺️ Pemetaan
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="#pemantauan" 
                                                onclick="event.preventDefault(); document.getElementById('pemantauan').scrollIntoView({ behavior: 'smooth' });"
                                                class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium"
                                            >
                                                📊 Pemantauan
                                            </a>
                                        </li>
                                        @guest
                                            <li>
                                                <a 
                                                    href="{{ url('/registrasi') }}" 
                                                    class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium"
                                                >
                                                    📝 Registrasi
                                                </a>
                                            </li>
                                            <li>
                                                <a 
                                                    href="{{ url('/login') }}" 
                                                    class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium"
                                                >
                                                    🔐 Login
                                                </a>
                                            </li>
                                        @endguest
                                        @auth
                                            <li>
                                                <a 
                                                    href="{{ url('/profil') }}"
                                                    class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium">
                                                    <span class="text-sm">👤</span> <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <!-- Tombol Logout -->
                                                <a 
                                                    href="#" 
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="block px-6 py-4 hover:bg-[#f0fdf4] hover:text-[#4caf50] transition-colors duration-200 font-medium">
                                                    <span class="text-sm">🚪</span> <span>Keluar</span>
                                                </a>

                                                <!-- Form Logout Tersembunyi -->
                                                <form id="logout-form" action="/logout" method="POST" class="hidden">
                                                    @csrf
                                                </form>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Baris 2 -->
                    <div class="flex flex-col md:flex-row text-white min-h-[350px] w-full max-w-[1000px] mx-auto">
                        <!-- Kolom Kiri -->
                        <div class="w-full md:w-[50%] flex flex-col items-center justify-center px-6 py-4">
                            <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-center">
                                <span class="text-[#8bc34a]">KHDTK</span> <span class="text-white">WANADIPA</span>
                            </p>

                            <p class="text-xl sm:text-2xl md:text-3xl font-bold mt-2 text-center" style="letter-spacing: 2px;">
                                UNIVERSITAS DIPONEGORO
                            </p>
                            <p class="text-white text-xl mt-4 text-justify leading-relaxed">
                                Sistem Pemetaan Demplot dan Pemantauan Tanaman di KHDTK Wanadipa Universitas Diponegoro.
                                Pantau lokasi demplot secara digital dan pemantauan pertumbuhan tanaman secara real-time.
                            </p>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="w-full md:w-[50%] h-[200px] md:h-[350px] flex items-center justify-center px-6 py-6">
                            <img src="{{ asset('images/p2.jpg') }}" alt="Gambar"
                                class="w-full h-full object-cover rounded-2xl" />
                        </div>
                    </div>

                    <!-- Baris 3 -->
                    <div class="text-white flex items-center h-[40px] shadow-lg">
                        <button 
                            class="flex justify-center items-center px-6 py-2 border-2 border-white rounded-3xl text-sm font-bold text-white bg-transparent cursor-pointer transition duration-300 hover:bg-[#8bc34a] hover:border-[#8bc34a] focus:outline-none"
                            onclick="document.getElementById('tentang').scrollIntoView({ behavior: 'smooth' });">
                            Mulai Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section 
        id="tentang" 
        class="flex justify-center items-center min-h-screen" 
        style="background-image: url('{{ asset('images/alas.jpg') }}'); background-size: cover; background-position: center;">

        <div class="bg-white/20 w-[85%] max-h-[90vh] border border-black/20 shadow-inner shadow-white/10 rounded-[30px] backdrop-blur-lg overflow-hidden px-4 sm:px-10 py-6 relative">
            <!-- Judul -->
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-6">
                <span class="text-white">Tentang</span> <span class="text-[#8bc34a]">Website</span>
            </h2>

            <!-- Wadah scroll -->
            <div class="flex justify-center mb-8">
                <div class="w-full max-h-[70vh] overflow-y-auto px-1">
                    <div class="grid grid-cols-1 gap-4">
                    <!-- Baris 1 -->
                    <div class="text-white flex items-center justify-center min-h-[260px] max-w-4xl mx-auto rounded-2xl overflow-hidden">
                        <!-- Swiper -->
                        <div class="swiper mySwiper w-full h-[220px]">
                            <div class="swiper-wrapper">
                            <!-- Set tinggi eksplisit pada slide -->
                            <div class="swiper-slide w-[220px] h-[220px] flex items-center justify-center">
                                <img src="images/p1.jpg" class="object-cover w-full h-full rounded-xl" alt="Slide 1" />
                            </div>
                            <div class="swiper-slide w-[220px] h-[220px] flex items-center justify-center">
                                <img src="images/p2.jpg" class="object-cover w-full h-full rounded-xl" alt="Slide 2" />
                            </div>
                            <div class="swiper-slide w-[220px] h-[220px] flex items-center justify-center">
                                <img src="images/p3.jpeg" class="object-cover w-full h-full rounded-xl" alt="Slide 3" />
                            </div>
                            <div class="swiper-slide w-[220px] h-[220px] flex items-center justify-center">
                                <img src="images/p4.jpg" class="object-cover w-full h-full rounded-xl" alt="Slide 4" />
                            </div>
                            <div class="swiper-slide w-[220px] h-[220px] flex items-center justify-center">
                                <img src="images/p5.png" class="object-cover w-full h-full rounded-xl" alt="Slide 5" />
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Baris 2 -->
                    <div class="text-white flex items-center justify-center min-h-[160px] w-11/12 max-w-[1000px] mx-auto">
                        <p class="text-base text-justify leading-relaxed">
                            Peta Tumbuh merupakan platform digital interaktif yang dirancang untuk mendukung kegiatan pemetaan lahan demplot serta pemantauan pertumbuhan tanaman di Kawasan Hutan dengan Tujuan Khusus (KHDTK) Wanadipa, Universitas Diponegoro. Website ini berperan sebagai pusat informasi geospasial yang mengintegrasikan data lapangan secara akurat dan real-time, guna menunjang aktivitas penelitian, pendidikan, dan pengelolaan hutan secara berkelanjutan. Melalui platform ini, pengguna dapat meninjau pemetaan demplot secara digital dan memantau pertumbuhan tanaman dengan mengisi formulir yang tersedia.
                        </p>
                    </div>

                    <!-- Baris 3 -->
                    <div class="text-white flex items-center justify h-[40px] shadow-lg">
                        <button 
                            class="flex justify-center items-center px-6 py-2 border-2 border-white rounded-3xl text-sm font-bold text-white bg-transparent cursor-pointer transition duration-300 hover:bg-[#8bc34a] hover:border-[#8bc34a] focus:outline-none"
                            onclick="window.open('https://khdtk.undip.ac.id/', '_blank')">
                            Lebih Lanjut
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section 
        id="pemetaan" 
        class="flex justify-center items-center min-h-screen" 
        style="background-image: url('{{ asset('images/alas.jpg') }}'); background-size: cover; background-position: center;">

        <div class="bg-white/20 w-[85%] max-h-[90vh] border border-black/20 shadow-inner shadow-white/10 rounded-[30px] backdrop-blur-lg overflow-hidden px-4 sm:px-10 py-6 relative">
            <!-- Judul -->
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-6">
                <span class="text-white">Pemetaan</span> <span class="text-[#8bc34a]">Demplot</span>
            </h2>

            <!-- Konten non-scrollable, 1 kolom penuh -->
            <div class="flex justify-center mb-8">
                <div class="w-full max-h-[70vh] overflow-y-auto px-1">
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Konten A -->
                        <div class="bg-white/20 backdrop-blur-md border border-white/30 text-white flex items-center justify-center min-h-[460px] shadow-lg">
                            <div class="relative text-white p-6 w-11/12 max-w-1xl h-[400px] text-center rounded-xl">
                                <div id="cesiumContainer" class="absolute inset-0">
                                    <script>
                                    Cesium.Ion.defaultAccessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJiMjNhYzNkYi05NjZlLTRlNmMtODkzYS1mNzQxMGU2YjQ3ZGMiLCJpZCI6MzI1MTM0LCJpYXQiOjE3NTM0NDU5OTh9.vLlbL2kFVv7oxNhH6X9GKS5n_YYnz6FBbeGztAjfnuY';

                                    const isSmallScreen = window.innerWidth < 1000; // Atur breakpoint sesuai kebutuhan (misal < 768px)

                                    const viewer = new Cesium.Viewer('cesiumContainer', {
                                    baseLayerPicker: !isSmallScreen,  // Nonaktifkan jika layar kecil
                                    timeline: false,
                                    animation: false,
                                    sceneModePicker: true,
                                    homeButton: true,
                                    fullscreenButton: false,
                                    geocoder: false,
                                    creditContainer: document.createElement('div')
                                    });

                                    viewer.camera.flyTo({
                                        destination: Cesium.Cartesian3.fromDegrees(110.4357, -7.1142, 500),
                                        orientation: {
                                        heading: Cesium.Math.toRadians(0),
                                        pitch: Cesium.Math.toRadians(-60),
                                        roll: 0.0
                                        },
                                        duration: 5 // durasi animasi dalam detik
                                    });

                                    viewer.homeButton.viewModel.command.beforeExecute.addEventListener(function (e) {
                                        e.cancel = true;
                                        viewer.camera.flyTo({
                                        destination: Cesium.Cartesian3.fromDegrees(110.4357, -7.1117, 500),
                                        duration: 2
                                        });
                                    });

                                    const positions = [
                                        [110.4344374999387,-7.111704683137653],[110.4344606039161,-7.111719958403394],[110.4345418356411,-7.111756627955065],
                                        [110.4345886021861,-7.111768482375338],[110.4346171653926,-7.111789946258906],[110.4346193500277,-7.111879489622765],
                                        [110.4346301229118,-7.111948104337102],[110.4346430564347,-7.11199201727794],[110.4346882888123,-7.112011068223299],
                                        [110.4347253915868,-7.11202059121189],[110.4347348024074,-7.112020917528918],[110.434768947718,-7.112022101506106],
                                        [110.4348156280052,-7.112014332942643],[110.4348326869097,-7.111985297366172],[110.4348341532507,-7.111954517819189],
                                        [110.4348463534867,-7.111901029447769],[110.4348833384213,-7.111831905905599],[110.4348758781757,-7.111818048221609],
                                        [110.4348867298833,-7.111810511676023],[110.4349108927225,-7.111793730507197],[110.4349511116606,-7.111780488627353],
                                        [110.4349902801719,-7.111775750726048],[110.4350606772922,-7.11179044638123],[110.4352241057413,-7.111833437032537],
                                        [110.4352592091848,-7.111843194218517],[110.4353871212963,-7.111881166003279],[110.4354037961748,-7.111900307170349],
                                        [110.435440145662,-7.111933482768454],[110.4354967783402,-7.111944132866534],[110.435516270594,-7.111945526262554],
                                        [110.4356222043884,-7.111944566286977],[110.4356901581219,-7.111946248843543],[110.4357077317701,-7.111937788607914],
                                        [110.4357137347557,-7.111928249281951],[110.43572140627,-7.111916058502566],[110.4357482863959,-7.111913646269502],
                                        [110.4357736899748,-7.111910760209246],[110.4358067903442,-7.11190478015425],[110.4358262745052,-7.111902722415842],
                                        [110.4358476783434,-7.111903214448598],[110.4361665682511,-7.111910545109188],[110.4362187601897,-7.111930276221475],
                                        [110.4362506064484,-7.111934642532283],[110.4362808204154,-7.111937226554687],[110.4363224164879,-7.111932106171817],
                                        [110.4363611803514,-7.111925274391591],[110.4363939194522,-7.111913033362098],[110.4365023586226,-7.111881972868154],
                                        [110.4366165137415,-7.111867861284456],[110.4366541870057,-7.111858563617258],[110.4369802172435,-7.111783347598529],
                                        [110.437008536231,-7.111753278699782],[110.4370299091547,-7.111691206601273],[110.4370299091547,-7.111597217891527],
                                        [110.4370180118495,-7.111342615563839],[110.4369707997494,-7.111301804218495],[110.4367931527845,-7.111352133407938],
                                        [110.436751512217,-7.111424706968644],[110.4365091077944,-7.111496056194882],[110.4364362336337,-7.111517505947803],
                                        [110.4363119824379,-7.111583475307268],[110.4362300922568,-7.111582190445338],[110.4361199636082,-7.111580462520289],
                                        [110.4360756780292,-7.111542850110487],[110.4360331132817,-7.111506699229094],[110.4358598802909,-7.111509235267651],
                                        [110.4357306837878,-7.111566185754275],[110.4356631070951,-7.111609967836783],[110.4356431196228,-7.111662315978887],
                                        [110.4356210871055,-7.111690792440577],[110.4356021928934,-7.111726085533859],[110.4355812536365,-7.111738458731052],
                                        [110.4355525875455,-7.111739403156768],[110.4355499044658,-7.111716842721366],[110.4355516670001,-7.111696666999938],
                                        [110.43555909164,-7.111692135947863],[110.4355798117012,-7.111678015856167],[110.4355963439863,-7.111664321850409],
                                        [110.4356031856554,-7.111640685973155],[110.4356008180568,-7.111611912900967],[110.4355870381788,-7.111595178090733],
                                        [110.4355515028001,-7.111547465761529],[110.4355115806198,-7.111536299028848],[110.4354872769809,-7.111535763462831],
                                        [110.435301667,-7.111533332999903],[110.4352771329186,-7.111557979838151],[110.4352022386168,-7.111585857190057],
                                        [110.435046898737,-7.111570036678418],[110.434896365587,-7.111473241207479],[110.4348192188233,-7.111423634477668],
                                        [110.4347941611884,-7.11140752197628],[110.4347899903729,-7.11140484006842],[110.4347773297098,-7.111362650701374],
                                        [110.4347486696572,-7.111336233840406],[110.4347450985889,-7.111332942275957],[110.4347541957603,-7.111296755601821],
                                        [110.434757714747,-7.111280742180892],[110.4347626585751,-7.111220254592857],[110.4347421608217,-7.111200736818722],
                                        [110.4346940211158,-7.111161966931268],[110.4346554194606,-7.111181646667651],[110.4346519101673,-7.111185779808413],
                                        [110.4345370709252,-7.111321034033038],[110.4344323936253,-7.111493037543759],[110.4344039371458,-7.111660029035526],
                                        [110.4344374999387,-7.111704683137653]
                                    ];

                                    // Konversi ke array Cartesian
                                    const cartesianPositions = positions.map(p => Cesium.Cartesian3.fromDegrees(p[0], p[1]));

                                    // Tambahkan jalur merah (polyline)
                                    const redPathCoordinatesEntrance = [
                                        [110.4368875860313,-7.111705077205677], [110.4368933450793,-7.111691590521056],
                                        [110.4368791686219,-7.111677206060068], [110.4368317210694,-7.111683610274702],
                                        [110.4365682315218,-7.11172888211778], [110.4365400971016,-7.11173078197306],
                                        [110.4363906772229,-7.111740871938603], [110.4363830776817,-7.111740519849327],
                                        [110.4362792719766,-7.111735710483843], [110.4362332829961,-7.111724884710473],
                                        [110.4361685793878,-7.11173557578232], [110.4360176026335,-7.111732424334829],
                                        [110.4358681009609,-7.111754164866788], [110.4358426957822,-7.111760835147341],
                                        [110.4358206693733,-7.111763754544075], [110.4357310290427,-7.111773622928706],
                                        [110.4356870316184,-7.111775381566617], [110.4355901230221,-7.111793554936483],
                                        [110.435551423512,-7.111795460025189], [110.4355191272028,-7.111798122435342],
                                        [110.4354772586987,-7.111802090078988], [110.4354501328432,-7.111774964223577],
                                        [110.4353880289109,-7.111721426350928], [110.4353515384381,-7.111679820394094],
                                        [110.4353880289109,-7.111721426350928], [110.4354265761792,-7.111754976751007],
                                        [110.4354501328432,-7.111774964223577], [110.4354772586987,-7.111802090078988],
                                        [110.4355332332984,-7.11179678567879], [110.4355901230221,-7.111793554936483],
                                        [110.4356845454022,-7.111775480943995], [110.4357379551832,-7.111772945317758],
                                        [110.4358190672656,-7.111764646010323], [110.4357975724706,-7.111739617840944],
                                        [110.4357800563436,-7.111728046818105], [110.4357633503431,-7.111717010957744],
                                        [110.435716144894,-7.111691465967306], [110.4356650402836,-7.111662297977984],
                                        [110.4355942875908,-7.111650980970685], [110.4355715242714,-7.111649809590215],
                                        [110.4355251418748,-7.111649753080624], [110.4354627823387,-7.111656424347134],
                                        [110.4354376843725,-7.111659109342598], [110.4353677553753,-7.111675681128141],
                                        [110.4353517739717,-7.111680088946435], [110.4353307433872,-7.111656110146321],
                                        [110.4353029036934,-7.111635051916383], [110.4352621078345,-7.111637455171932],
                                        [110.4352282005152,-7.111651731938022], [110.435163955068,-7.111658870321096],
                                        [110.4350544980676,-7.111634978691889], [110.4350467666135,-7.111633291115179],
                                        [110.4349795468401,-7.111578563512126], [110.4349515881733,-7.111554174036822],
                                        [110.4348888199749,-7.111520643465495], [110.4348803279551,-7.111518855671862],
                                        [110.4348502727065,-7.111506723618611], [110.434816008468,-7.111480311601436],
                                        [110.4347903102891,-7.111456041099188], [110.4347607157429,-7.111412925265701],
                                        [110.4347546243227,-7.111388369228167], [110.4347133330002,-7.111346666999905],
                                        [110.4347148090424,-7.11132600594963], [110.4347202818665,-7.111295523333953],
                                        [110.4347094672164,-7.111272287897299], [110.4346741322205,-7.111227316084184],
                                        [110.4347094672164,-7.111272287897299], [110.4347202818665,-7.111295523333953],
                                        [110.434715,-7.111323332999905], [110.4347133330002,-7.111346666999905],
                                        [110.43471,-7.111413332999976], [110.4347233330001,-7.111428332999943],
                                        [110.4347233330001,-7.111446666999931], [110.4346416670001,-7.111539999999898],
                                        [110.434603333,-7.111538332999947], [110.4345650000001,-7.111531666999953],
                                        [110.434538333,-7.111544999999974]
                                    ];

                                    // Konversi ke Cartesian3
                                    const redPathEntranceCartesian = redPathCoordinatesEntrance.map(p => Cesium.Cartesian3.fromDegrees(p[0], p[1]));

                                    // Tambahkan entitas garis merah ke viewer
                                    viewer.entities.add({
                                        name: "Jalur Masuk Merah",
                                        polyline: {
                                        positions: redPathEntranceCartesian,
                                        width: 4,
                                        material: Cesium.Color.RED
                                        }
                                    });

                                    // Jalur kembali berwarna merah (koordinat baru)
                                    const redReturnPathCoordinates = [
                                        [110.4344219985835,-7.111627200369235], [110.434441986056,-7.111662178446124],
                                        [110.4344616166092,-7.111687162786667], [110.434478084951,-7.111701642124046],
                                        [110.4345005025365,-7.111719187178265], [110.4345282054396,-7.111734378347648],
                                        [110.4345526810537,-7.111746257017961], [110.434570170092,-7.111750540047692],
                                        [110.4345922990793,-7.111752324643482], [110.434643338518,-7.111777308984011],
                                        [110.4346597750144,-7.11179656785089], [110.43467,-7.111819999999907],
                                        [110.4346800000002,-7.111836666999984], [110.4346883330001,-7.111854999999883],
                                        [110.4346940210373,-7.111881576965279], [110.4347009214741,-7.111886811779578],
                                        [110.4347166259168,-7.111889191240554], [110.4347261437608,-7.111889191240547],
                                        [110.4347392307964,-7.111892284539862], [110.4347623115682,-7.11189775730015],
                                        [110.4347919493993,-7.11191625394923], [110.4348134816092,-7.111917624039508],
                                        [110.434830364153,-7.1119053715754], [110.4348391681586,-7.111879911342665],
                                        [110.4348432132424,-7.111855402894214], [110.4348506242513,-7.111840248583518],
                                        [110.434856538224,-7.111824945793391], [110.4348572520623,-7.111815665895444],
                                        [110.4348617730382,-7.111803292698262], [110.4348717667744,-7.111796392261289],
                                        [110.4348850000001,-7.111779999999901], [110.4348866394552,-7.111771802724661],
                                        [110.4348967610294,-7.111754672378367], [110.434901817384,-7.111743964803785],
                                        [110.4349070727551,-7.111726819847157], [110.4349291811856,-7.111716898434857],
                                        [110.4349485143063,-7.111711247214992], [110.4349717140511,-7.111708867754039],
                                        [110.4350150000002,-7.111711666999886], [110.4350350000001,-7.111711666999902],
                                        [110.4350583330001,-7.111716666999876], [110.435090690107,-7.111736983048904],
                                        [110.4351209290624,-7.111742794200103], [110.4351500366087,-7.111742594606986],
                                        [110.4351773091011,-7.111744331463973], [110.4352066670002,-7.111741666999925],
                                        [110.4352266598141,-7.111739895925499], [110.4352887599495,-7.111761896878417],
                                        [110.4353053447621,-7.111772446523733], [110.4353159768488,-7.111776777571092],
                                        [110.4353522528296,-7.111787129892206], [110.4353653946043,-7.111788462852876],
                                        [110.4353850000001,-7.111793332999917], [110.4353968253893,-7.111794177670558],
                                        [110.4354187417149,-7.111795743122395], [110.4354241317375,-7.111796128124062],
                                        [110.4354308552434,-7.111800746674925], [110.4354365064631,-7.111804910731678],
                                        [110.4354600036407,-7.11182721817869], [110.4354677368889,-7.111833761696404],
                                        [110.4354760650024,-7.111839412916259], [110.4354873674422,-7.111841792377337],
                                        [110.4354948032579,-7.111839115483694], [110.435498669882,-7.111835843724801],
                                        [110.4354998596125,-7.111831084802757], [110.4355041728836,-7.111826048157801],
                                        [110.4355136812355,-7.111828290288992], [110.4355667138479,-7.111827548248522],
                                        [110.4355895140934,-7.111826331667202], [110.4356664814835,-7.111811292691068],
                                        [110.4357012301086,-7.111807786305684], [110.4357475297771,-7.111804842322206],
                                        [110.4360023965771,-7.111768356127187], [110.4360469398134,-7.111764224790019],
                                        [110.4361210525798,-7.111761703804398], [110.4361686705806,-7.111768127238911],
                                        [110.4362352954886,-7.111753850472893], [110.4362592102697,-7.111761871938714],
                                        [110.4363064367799,-7.111766339148237], [110.4364165772765,-7.111769913402836],
                                        [110.4365311366766,-7.111762202745981], [110.4365918665092,-7.111754360768719],
                                        [110.4367471940247,-7.111730447241489], [110.4368875860313,-7.11170507720561]
                                    ];

                                    // Konversi ke Cartesian
                                    const redReturnPathCartesian = redReturnPathCoordinates.map(p => Cesium.Cartesian3.fromDegrees(p[0], p[1]));

                                    // Tambahkan polyline kembali ke viewer
                                    viewer.entities.add({
                                        name: "Jalur Keluar Merah",
                                        polyline: {
                                        positions: redReturnPathCartesian,
                                        width: 4,
                                        material: Cesium.Color.RED
                                        }
                                    });

                                    const dummyPoints = [
                                        {
                                        name: "Titik Keluar",
                                        position: Cesium.Cartesian3.fromDegrees(110.4346740917407, -7.111222051937765),
                                        image: "images/jalurkeluar.jpg",
                                        color: Cesium.Color.RED
                                        },
                                        {
                                        name: "Titik Masuk",
                                        position: Cesium.Cartesian3.fromDegrees(110.4344238494077, -7.111620260274774),
                                        image: "images/jalurmasuk.jpg",
                                        color: Cesium.Color.GREEN
                                        },
                                        {
                                        name: "Bedengan 1",
                                        position: Cesium.Cartesian3.fromDegrees(110.4352968410001, -7.111665682999961),
                                        image: "images/bedengan1.jpg",
                                        color: Cesium.Color.YELLOW
                                        },
                                        {
                                        name: "Bedengan 2",
                                        position: Cesium.Cartesian3.fromDegrees(110.4347402987297, -7.111948725169175),
                                        image: "images/bedengan2.jpg",
                                        color: Cesium.Color.YELLOW
                                        },
                                        {
                                        name: "Kolam",
                                        position: Cesium.Cartesian3.fromDegrees(110.4345433330001, -7.111481666999969),
                                        image: "images/kolam.jpg",
                                        color: Cesium.Color.CYAN
                                        },
                                        {
                                        name: "WC",
                                        position: Cesium.Cartesian3.fromDegrees(110.4344991497194, -7.111573628881612),
                                        image: "images/wc.jpg",
                                        color: Cesium.Color.BLUE
                                        },                
                                        {
                                        name: "Gazebo 1",
                                        position: Cesium.Cartesian3.fromDegrees(110.43453788883, -7.111543614832053),
                                        image: "images/gazebo1.jpg",
                                        color: Cesium.Color.YELLOW
                                        },
                                        {
                                        name: "Gazebo 2",
                                        position: Cesium.Cartesian3.fromDegrees(110.4345689820741, -7.111444211302662),
                                        image: "images/gazebo2.jpg",
                                        color: Cesium.Color.YELLOW
                                        },
                                        {
                                        name: "Endpoint 1",
                                        position: Cesium.Cartesian3.fromDegrees(110.435483399599, -7.111835244576649),
                                        image: "images/endpoint1.jpg",
                                        color: Cesium.Color.ORANGE
                                        },
                                        {
                                        name: "Endpoint 2",
                                        position: Cesium.Cartesian3.fromDegrees(110.4368871831416, -7.111722076863631),
                                        image: "images/endpoint2.jpg",
                                        color: Cesium.Color.ORANGE
                                        },
                                        {
                                        name: "Jembatan",
                                        position: Cesium.Cartesian3.fromDegrees(110.435620, -7.111655),
                                        image: "images/jembatan.jpg",
                                        color: Cesium.Color.BROWN
                                        }
                                    ];

                                    dummyPoints.forEach(point => {
                                        viewer.entities.add({
                                        name: point.name,
                                        position: point.position,
                                        point: {
                                            pixelSize: 10,
                                            color: point.color, // ← Warna berbeda tiap titik
                                            outlineColor: Cesium.Color.WHITE,
                                            outlineWidth: 2
                                        },
                                        description: `
                                            <div style="margin: 0 auto; padding: 0; text-align: center; width: 100%; max-width: 250px;">
                                            <img src="${point.image}" 
                                                style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px; display: block; margin: 0 auto;">
                                            </div>
                                        `
                                        });
                                    });


                                    viewer.zoomTo(viewer.entities);

                                    // Tambahkan garis outline
                                    viewer.entities.add({
                                        name: "Outline Wilayah",
                                        polyline: {
                                        positions: cartesianPositions,
                                        width: 5,
                                        material: Cesium.Color.ORANGE,
                                        clampToGround: true
                                        }
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
        
    <section 
        id="pemantauan" 
        class="flex justify-center items-center min-h-screen" 
        style="background-image: url('{{ asset('images/alas.jpg') }}'); background-size: cover; background-position: center;">

        <div class="bg-white/20 w-[85%] max-h-[90vh] border border-black/20 shadow-inner shadow-white/10 rounded-[30px] backdrop-blur-lg overflow-hidden px-4 sm:px-10 py-6 relative">

            <!-- Judul -->
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-6">
                <span class="text-white">Pemantauan</span> <span class="text-[#8bc34a]">Tanaman</span>
            </h2>

            <!-- Konten scrollable -->
            <div class="relative">
                @guest
                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-black/70 backdrop-blur-sm text-white z-10 text-center px-4">
                        <i class="fa-solid fa-lock text-4xl mb-2 text-yellow-500"></i>
                        <div class="text-lg font-semibold">Silakan login terlebih dahulu</div>
                        <div class="text-sm">untuk bisa mengakses fitur ini.</div>
                    </div>
                @endguest
                <div class="flex justify-center mb-8">
                    <div class="w-full max-h-[70vh] overflow-y-auto overflow-x-hidden px-1">
                        <div class="grid gap-4 md:grid-cols-[3fr_7fr] min-h-[460px]">
                            <!-- Konten A -->
                            <div class="bg-white/20 rounded-xl backdrop-blur-md border border-white/30 text-white flex flex-col shadow-lg overflow-y-auto max-h-[70vh] scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
                                <div class="w-full max-w-full mx-auto mt-4 space-y-4 ">
                                <!-- Komponen per tanggal -->
                                <div class="flex flex-col space-y-2">
                                    @foreach ($catatans->sortKeysDesc() as $tanggal => $catatanGroup)
                                        <!-- Pembungkus Tanggal -->
                                        <div class="flex justify-center relative overflow-hidden px-4">
                                            <!-- Konten tanggal -->
                                            <div class="w-full max-w-md sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl 2xl:max-w-2xl z-10">
                                                <div class="rounded-lg bg-blue-200 text-blue-700 text-sm font-semibold px-4 py-1 shadow-sm border-y border-blue-200 text-center">
                                                    📅 {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Container Semua Data -->
                                        <div class="w-full max-w-sm mx-auto px-7 mt-0">
                                            <!-- Kotak Scroll -->
                                            <div class="max-h-[194px] overflow-y-scroll scrollbar-hide">
                                                <div class="pointer pointer-events-none space-y-1">
                                                    @foreach ($catatanGroup as $catatan)
                                                    <div class="plant-box" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                                                        <div class="w-full max-w-xs p-4 border rounded-lg shadow hover:bg-gray-100 mx-auto bg-white">
                                                            <div class="flex flex-col space-y-1">
                                                                <div class="text-sm text-gray-900 font-bold text-center">🌱 {{ $catatan->nama_tanaman }}</div>
                                                                <div class="text-xs text-gray-600 flex flex-col items-center space-y-1">
                                                                    <div class="flex items-center">
                                                                        <span>📌 {{ $catatan->lokasi_tanaman }}</span>
                                                                    </div>

                                                                    <div class="flex items-center gap-x-2">
                                                                        <span>
                                                                            @if($catatan->kondisi_cuaca === 'cerah') 🌤 Cerah
                                                                            @elseif($catatan->kondisi_cuaca === 'berawan') ☁ Berawan
                                                                            @elseif($catatan->kondisi_cuaca === 'hujan') 🌧 Hujan
                                                                            @else 🌡 {{ ucfirst($catatan->kondisi_cuaca) }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="text-gray-400">•</span>
                                                                        <span>🌡️ {{ ($catatan->suhu ?? '32') . '°C' }}</span>
                                                                    </div>

                                                                    <div class="flex items-center gap-x-2">
                                                                        <span>💦 {{ ($catatan->kelembapan ?? '75') . '%' }}</span>
                                                                        <span class="text-gray-400">•</span>
                                                                        <span>
                                                                            @if($catatan->penyiraman === 'sudah') 
                                                                                💧 Sudah disiram
                                                                            @elseif($catatan->penyiraman === 'belum') 
                                                                                🚫 Belum disiram
                                                                            @else 
                                                                                -
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            </div>

                            <!-- Konten B berisi Form -->
                            <div class="bg-white/20 rounded-xl backdrop-blur-md border border-white/30 text-white pt-2 px-6 pb-6 shadow-lg overflow-y-auto max-h-[70vh] scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
                                <form method="POST" action="{{ route('catatan.store') }}" class="space-y-4 text-white">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                    <!-- Tambahkan space-y-4 di sini -->
                                    <div class="space-y-4">
                                        <div>
                                            <label for="tanggal" class="block font-medium mb-1">Tanggal</label>
                                            <input type="text" id="tanggal" name="tanggal" required autocomplete="off" placeholder="hh/bb/tttt" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]">
                                        </div>

                                        <div>
                                            <label for="nama_tanaman" class="block font-medium mb-1">Nama Tanaman</label>
                                            <input type="text" id="nama_tanaman" name="nama_tanaman" maxlength="17" placeholder="Contoh: Tomat" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]">
                                        </div>

                                        <div>
                                            <label for="lokasi_tanaman" class="block font-medium mb-1">Lokasi Tanaman</label>
                                            <input type="text" id="lokasi_tanaman" name="lokasi_tanaman" maxlength="20" placeholder="Contoh: Polybag A1" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]">
                                        </div>

                                        <div>
                                            <label for="kondisi_cuaca" class="block font-medium mb-1">Kondisi Cuaca</label>
                                            <select id="kondisi_cuaca" name="kondisi_cuaca" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] appearance-none">
                                                <option value="">-- Pilih Cuaca --</option>
                                                <option value="cerah">Cerah</option>
                                                <option value="berawan">Berawan</option>
                                                <option value="hujan">Hujan</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="suhu" class="block font-medium mb-1">Suhu (°C)</label>
                                            <input type="number" id="suhu" name="suhu" step="0.1" min="-100" max="100" placeholder="Contoh: -10.5 atau 29.5"
                                            oninput="formatSuhu(this)" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]">
                                        </div>

                                        <div>
                                            <label for="kelembapan" class="block font-medium mb-1">Kelembapan (%)</label>
                                            <input type="number" id="kelembapan" name="kelembapan" step="1" min="1" max="100" placeholder="Contoh: 75"
                                            oninput="batasiKelembapan(this)" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]">
                                        </div>

                                        <div>
                                            <label for="penyiraman" class="block font-medium mb-1">Penyiraman</label>
                                            <select id="penyiraman" name="penyiraman" required
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a] appearance-none">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="sudah">Sudah</option>
                                            <option value="belum">Belum</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="pemupukan" class="block font-medium mb-1">Pemupukan</label>
                                            <input type="text" id="pemupukan" name="pemupukan" maxlength="200" placeholder="Jenis dan dosis (jika ada)"
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]">
                                        </div>

                                        <div>
                                            <label for="pertumbuhan_tanaman" class="block font-medium mb-1">Pertumbuhan Tanaman</label>
                                            <textarea id="pertumbuhan_tanaman" name="pertumbuhan_tanaman" maxlength="200" placeholder="Tinggi, jumlah daun, bunga, dll"
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]"></textarea>
                                        </div>

                                        <div>
                                            <label for="kondisi_tanaman" class="block font-medium mb-1">Kondisi Tanaman</label>
                                            <textarea id="kondisi_tanaman" name="kondisi_tanaman" maxlength="200" placeholder="Misalnya: sehat, layu, ada hama"
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]"></textarea>
                                        </div>

                                        <div>
                                            <label for="perlakuan_khusus" class="block font-medium mb-1">Perlakuan Khusus</label>
                                            <textarea id="perlakuan_khusus" name="perlakuan_khusus" maxlength="200" placeholder="Pemangkasan, semprot pestisida, dll"
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]"></textarea>
                                        </div>

                                        <div>
                                            <label for="catatan_tambahan" class="block font-medium mb-1">Catatan Tambahan</label>
                                            <textarea id="catatan_tambahan" name="catatan_tambahan" rows="3" maxlength="200" placeholder="Catatan lainnya..."
                                            class="w-full px-3 py-2 rounded-md border border-white text-white placeholder-white bg-transparent focus:outline-none focus:ring-1 focus:ring-[#8bc34a] focus:border-[#8bc34a]"></textarea>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit"
                                            class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-600 transition duration-200">
                                            Simpan Catatan
                                            </button>
                                        </div>

                                        @guest
                                            </fieldset>
                                        @endguest
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="footer" class="bg-[#132217] text-white py-6 px-4">
        <div class="flex justify-center">
            <div class="bg-white/20 w-[86%] max-h-[90vh] border border-black/20 shadow-inner shadow-white/10 rounded-[30px] backdrop-blur-lg overflow-hidden px-4 sm:px-10 py-6 relative flex flex-col items-center gap-6">
            <!-- Baris pertama: Ikon Sosial Media -->
            <div class="flex justify-center gap-6">
                <!-- WhatsApp -->
                <a href="https://wa.me/6287737978567" target="_blank" class="w-12 h-12 rounded-full border border-white flex items-center justify-center hover:bg-white/10 transition">
                <i class="fa-brands fa-whatsapp text-2xl"></i>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/naufalizu?igsh=ZDN1d3kxZDBocHh2" target="_blank" class="w-12 h-12 rounded-full border border-white flex items-center justify-center hover:bg-white/10 transition">
                <i class="fa-brands fa-instagram text-2xl"></i>
                </a>

                <!-- YouTube -->
                <a href="https://www.youtube.com/@Naufalizzu" target="_blank" class="w-12 h-12 rounded-full border border-white flex items-center justify-center hover:bg-white/10 transition">
                <i class="fa-brands fa-youtube text-2xl"></i>
                </a>
            </div>

            <!-- Baris kedua: Copyright -->
            <p class="text-sm text-center">© Muhammad Naufal Izzudin 2025</p>

            </div>
        </div>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        window.addEventListener("load", function () {
            new Swiper(".mySwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                loop: true,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 150,
                    modifier: 1.5,
                    slideShadows: false,
                },
                // Default untuk layar kecil (< 1280px)
                slidesPerView: 'auto',

                // Untuk layar >= 1280px
                breakpoints: {
                    1280: {
                        slidesPerView: 2,
                    }
                }
            });
        });
    </script>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Script -->
    <script>
        // Inisialisasi Flatpickr
        const input = document.getElementById('tanggal');
        const picker = flatpickr(input, {
            clickOpens: false // Kita kontrol kapan open-nya
        });

        // Trigger open saat label atau input diklik
        const label = document.querySelector('label[for="tanggal"]');

        input.addEventListener('click', () => picker.open());
        label.addEventListener('click', () => picker.open());
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr("#tanggal", {
            dateFormat: "Y-m-d",
            minDate: "today" // Tidak bisa pilih hari sebelum hari ini
            });
        });
    </script>

    <script>
        // Ambil elemen dari DOM
        const weatherEl = document.getElementById("weather");
        const wateringEl = document.getElementById("watering");
        const temperatureEl = document.getElementById("temperature");
        const humidityEl = document.getElementById("humidity");

        // Ambil teks
        const cuacaText = weatherEl.textContent.trim().toLowerCase();
        const penyiramanText = wateringEl.textContent.trim().toLowerCase();
        const suhuText = temperatureEl.textContent.trim();
        const kelembapanText = humidityEl.textContent.trim();

        // Ganti ikon cuaca
        if (cuacaText === "cerah") {
            weatherEl.textContent = "☀️ Cerah";
        } else if (cuacaText === "berawan") {
            weatherEl.textContent = "☁️ Berawan";
        } else if (cuacaText === "hujan") {
            weatherEl.textContent = "🌧️ Hujan";
        } else {
            weatherEl.textContent = "❓ Tidak diketahui";
        }

        // Ganti ikon penyiraman
        if (penyiramanText === "sudah") {
            wateringEl.textContent = "💧 Sudah disiram";
        } else if (penyiramanText === "belum") {
            wateringEl.textContent = "🚫 Belum disiram";
        } else {
            wateringEl.textContent = "❓ Status tidak diketahui";
        }

        // Validasi dan tambahkan ikon suhu
        if (/^\d{1,2}°C$/.test(suhuText)) {
            temperatureEl.textContent = `🌡️ ${suhuText}`;
        } else {
            temperatureEl.textContent = "🌡️ Tidak valid";
        }

        // Validasi dan tambahkan ikon kelembapan
        if (/^\d{1,3}%$/.test(kelembapanText)) {
            humidityEl.textContent = `💦 ${kelembapanText}`;
        } else {
            humidityEl.textContent = "💦 Tidak valid";
        }
    </script>

</body>
</html>