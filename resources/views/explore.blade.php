@extends('layout.template')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="mb-5">Explore the Wonders of Rembang</h1>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <a href="{{ route('explore.culture') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0"
                        style="background: url('{{ asset('icons/bgg.png') }}') center center / cover no-repeat;">

                        <div class="card-body">
                            <i class="fa-solid fa-palette fa-3x mb-3 text-warning"></i>
                            <h5 class="card-title">Coastal Culture</h5>
                            <p class="card-text">Learn about the rich traditions and lifestyle of Rembang’s coastal
                                communities.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('explore.facilities') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0"
                        style="background: url('{{ asset('icons/bgg.png') }}') center center / cover no-repeat;">
                        <div class="card-body">
                            <i class="fa-solid fa-building fa-3x mb-3 text-success"></i>
                            <h5 class="card-title">Facilities</h5>
                            <p class="card-text">Explore the available public facilities and infrastructure around the
                                coast.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('explore.gallery') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0"
                        style="background: url('{{ asset('icons/bgg.png') }}') center center / cover no-repeat;">
                        <div class="card-body">
                            <i class="fa-solid fa-image fa-3x mb-3 text-danger"></i>
                            <h5 class="card-title">Gallery</h5>
                            <p class="card-text">Browse photos capturing the natural beauty and charm of the seaside.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <!-- Tombol navigasi ke rute -->
    <section id="explore-intro" class="py-4 mb-5">
        <div class="container text-center">
            <h5 class="fw-semibold mb-2">Explore the Coastal Area of Rembang</h5>
            <p class="text-muted mb-3">
                Select your favorite beach destination and view the map directly. Click the button below to display the list of beach locations.
            </p>
            <a href="#pantai-rute-section" class="btn btn-primary px-4 py-2">Beach Location Routes</a>
        </div>
    </section>

    <!-- Section Intro Sebelum Rute Pantai -->
    <section id="pantai-intro-section" style="background-color: #f3d7aa;" class="py-5 mb-5">
        <div class="container text-center">
            <h5 class="fw-semibold mb-2">Find Your Favorite Beach in Rembang!</h5>
            <p class="text-muted mb-0">
                Rembang Regency, stretching from the western to the eastern coastline, offers a variety of beaches each with
                its own unique charm:
                white sandy shores, shady pine trees, maritime history, and Instagram-worthy photo spots.
                Choose your desired beach and see the route directly below!
            </p>
        </div>
    </section>

    <!-- Section Rute Lokasi Pantai -->
    <section id="pantai-rute-section" class="pt-3 pb-1"
        style="scroll-margin-top: 180px; background: url('{{ asset('icons/bgg.png') }}') center / cover no-repeat fixed;">

        <div class="container text-center mb-3 highlight-on-scroll">
            <h4 class="fw-semibold mb-2">Beach Location Routes</h4>
        </div>

        <div class="container">
            {{-- 5 kolom per baris di layar besar --}}
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3">
                @foreach ([['Pantai Jatisari', '-6.632602, 111.514513'], ['Pantai Binangun', '-6.649212, 111.466801'], ['Pantai Karangjahe', '-6.6874075,111.4119639'], ['Pantai Caruban', '-6.6778619,111.4271362'], ['Pantai Nyamplung', '-6.692043,111.3976741'], ['Pantai Dasun', '-6.676165, 111.444329'], ['Pantai Wates', '-6.689485, 111.282624'], ['Pantai Dampo Awang', '-6.702426, 111.341775'], ['Pantai Balongan', '-6.678687, 111.604660'], ['Pantai Swalan', '-6.694026, 111.393219']] as [$name, $coords])
                    <div class="col">
                        <div class="card h-100 shadow-sm">

                            {{-- Preview peta --}}
                            <div class="ratio ratio-4x3"> {{-- responsif 4:3 --}}
                                <iframe src="https://maps.google.com/maps?q={{ $coords }}&z=15&output=embed"
                                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    class="rounded-top">
                                </iframe>
                            </div>

                            {{-- Konten kartu --}}
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $name }}</h6>
                                <a href="https://www.google.com/maps/dir/?api=1&destination={{ $coords }}"
                                    target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                    Open Route in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="pantai-rute-quote" class="container text-center mt-4">
            <p class="fs-5 fst-italic">
                Exploring the beaches of Rembang is not just a travel journey,<br>
                but also a deep connection with local culture, stories, and the warmth of coastal communities.
            </p>
        </div>

        <div class="text-center mt-2 mb-4">
            <a href="{{ route('map') }}" class="btn btn-outline-primary px-4 py-2">
                🌍 View All Locations on the Map Display
            </a>
        </div>
    </section>

    <!-- Tambahkan script dan style untuk scroll smooth dan highlight -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        .highlight-on-scroll.animate {
            animation: fadeInUp 0.8s ease-in-out both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("animate");
                    }
                });
            });

            const target = document.querySelector(".highlight-on-scroll");
            if (target) observer.observe(target);

            // Scroll tambahan agar kutipan terlihat setelah tombol diklik
            document.querySelector("a[href='#pantai-rute-section']")?.addEventListener("click", function(e) {
                e.preventDefault();
                const section = document.getElementById("pantai-rute-section");
                if (section) {
                    const sectionTop = section.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo({
                        top: sectionTop - 50,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endsection
