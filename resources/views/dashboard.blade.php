<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEASIDE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body style="background: url('{{ asset('icons/bgg.png') }}') center / cover no-repeat fixed;" class="font-sans">
    <!-- Navbar -->
    <nav class="flex items-center justify-between px-10 py-3">
        <div class="text-2xl font-bold text-[#2d2e2b] flex items-center gap-2">
            <i class="fa-solid fa-earth-asia text-xl text-[#2d2e2b]"></i>
            SEASIDE
        </div>


        <ul class="flex space-x-10 text-[#3d3d3d] font-medium">
            <li><a href="{{ route('home') }}" class="border-b-2 border-[#b79b64] pb-1">Home</a></li>
            <li><a href="{{ route('map') }}">Beaches</a></li>
            <li><a href="{{ route('explore.culture') }}">Culture</a></li>
            <li><a href="{{ route('about') }}">Contact</a></li>
        </ul>

        @auth
            <div x-data="{ open: false }" class="relative flex items-center space-x-2">
                <!-- Nama User Langsung Tampil -->
                <span class="text-sm font-semibold text-[#2d2e2b] hidden md:inline">
                    Hi, {{ Auth::user()->name }}
                </span>

                <!-- Icon Profil + Dropdown -->
                <button @click="open = !open" class="focus:outline-none">
                    <i class="fas fa-user-circle text-2xl text-[#2d2e2b]"></i>
                </button>

                <!-- Dropdown -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2 z-50">
                    <div class="px-4 py-2 text-sm text-gray-700">
                        <strong>Hi, {{ Auth::user()->name }}</strong>
                    </div>
                    <div class="border-t my-1"></div>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 text-gray-700">
                        Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </nav>


    <!-- Hero Section -->
    <section class="grid grid-cols-1 lg:grid-cols-2 px-10 lg:px-20 py-14 items-center gap-16">
        <div>
            <h1 class="text-5xl font-bold text-[#2d2e2b] leading-tight">
                Discover the Serenity<br />of Rembang’s Beaches
            </h1>
            <p class="text-[#5a5a5a] mt-6 text-lg">
                From the iconic Karang Jahe Beach to the peaceful mangroves,
                Rembang offers a coastal escape filled with charm, tradition, and natural beauty.
            </p>
            <div class="mt-8 flex space-x-4">
                <a href="{{ route('home') }}"
                    class="bg-[#3d513f] text-white px-6 py-3 rounded-md font-semibold hover:bg-[#2f3c2f]">Explore
                    Now</a>
                <a href="{{ route('about') }}"
                    class="border border-[#3d513f] px-6 py-3 rounded-md font-semibold text-[#3d513f] hover:bg-[#e7e7e3]">Learn
                    More</a>
            </div>
        </div>

        <!-- Modified Hero Image Section -->
        <div class="relative w-full h-[500px]">
            <!-- Kotak Video Utama (di belakang) -->
            <div class="absolute inset-0 z-0 rounded-[60px] overflow-hidden shadow-xl">
                <video autoplay muted loop playsinline class="w-full h-full object-cover">
                    <source src="{{ asset('video/pantai.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>


            <!-- Lingkaran Atas-Kiri (di depan) -->
            <div
                class="absolute top-0 left-0 z-10 w-56 h-56 rounded-full overflow-hidden ring-4 ring-white shadow-2xl -translate-y-8 -translate-x-8">
                <img src="images/karangjahe.jpg" alt="Karang Jahe" class="w-full h-full object-cover">
            </div>

            <!-- Lingkaran Bawah-Kanan (di depan) -->
            <div
                class="absolute bottom-0 right-0 z-10 w-64 h-64 rounded-full overflow-hidden ring-4 ring-white shadow-2xl translate-y-8 translate-x-8">
                <img src="images/mangrove.jpg" alt="Mangrove Rembang" class="w-full h-full object-cover">
            </div>
        </div>
    </section>


    <!-- Features -->
    <section id="explore" class="px-10 lg:px-20 py-5 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl shadow hover:shadow-lg" style="background-color: #f3d7aa;">
            <h3 class="font-bold text-lg text-[#374a3d] mb-2">Certified Clean Tourism</h3>
            <p class="text-sm text-gray-600">
                Rembang’s beaches are certified for cleanliness, safety, and sustainability. Enjoy your trip with peace
                of mind.
            </p>
        </div>
        <div class="p-6 rounded-xl shadow hover:shadow-lg" style="background-color: #f3d7aa;">
            <h3 class="font-bold text-lg text-[#374a3d] mb-2">Cultural Experience</h3>
            <p class="text-sm text-gray-600">
                Visit traditional fishing villages, explore coastal culture, and enjoy culinary delights unique to
                Rembang.
            </p>
        </div>
        <div class="p-6 rounded-xl shadow hover:shadow-lg" style="background-color: #f3d7aa;">
            <h3 class="font-bold text-lg text-[#374a3d] mb-2">Family Friendly</h3>
            <p class="text-sm text-gray-600">
                The calm waves and clean sand make Rembang’s beaches perfect for a family holiday or group adventure.
            </p>
        </div>
    </section>
</body>

</html>
