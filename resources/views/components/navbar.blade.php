<nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background-color: #f3d7aa;">
    <div class="container">

        {{-- Judul Branding --}}
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fa-solid fa-earth-asia me-2"></i>SEASIDE
        </a>

        {{-- About di sebelah kanan branding --}}
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link text-primary" href="{{ route('about') }}">
                    <i class="fa-solid fa-circle-info me-2"></i>About
                </a>
            </li>
        </ul>




        {{-- Tombol Toggle untuk mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Isi menu navbar --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                {{-- Menu Utama --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active text-warning bg-white rounded' : '' }}"
                        href="{{ route('home') }}">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('map') ? 'active text-warning bg-white rounded' : '' }}"
                        href="{{ route('map') }}">
                        <i class="fa-solid fa-map"></i> Map
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('table') ? 'active text-warning bg-white rounded' : '' }}"
                        href="{{ route('table') }}">
                        <i class="fa-solid fa-table"></i> Table
                    </a>
                </li>



                {{-- Menu saat login --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-database"></i> Data
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('api.points') }}" target="_blank">Points</a></li>
                            <li><a class="dropdown-item" href="{{ route('api.polylines') }}" target="_blank">Polylines</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('api.polygons') }}" target="_blank">Polygons</a>
                            </li>
                        </ul>
                    </li>

                    {{-- Menu Explore global --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('explore') ? 'active text-warning bg-white rounded' : '' }}"
                            href="{{ route('explore') }}">
                            <i class="fa-solid fa-compass"></i> Explore
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('reviews.index') ? 'active text-warning bg-white rounded' : '' }}"
                            href="{{ route('reviews.index') }}">
                            <i class="fa-solid fa-comments me-1"></i> Reviews
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link text-danger bg-transparent border-0">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth

                {{-- Menu saat belum login --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('login') }}">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="{{ route('register') }}">
                            <i class="fa-solid fa-user-plus me-1"></i> Register
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link:hover {
        background-color: rgba(183, 155, 25, 0.5);
        /* Putih semi-transparan */
        border-radius: 6px;
        transition: background-color 0.2s ease-in-out;
    }
</style>
