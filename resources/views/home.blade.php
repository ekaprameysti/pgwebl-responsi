@php
    $showNavbar = false; // agar layout.template tidak menampilkan navbar secara global
@endphp

@extends('layout.template')

@section('content')
    <style>
        /* HERO SECTION */
        .hero-container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('{{ asset('images/pantai.jpeg') }}') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
            scroll-behavior: smooth;
            z-index: 1;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
        }

        .hero-text p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .hero-text a.btn-explore {
            background-color: #212529;
            color: white;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            scroll-behavior: smooth;
        }

        .hero-text a.btn-explore:hover {
            background-color: #343a40;
        }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        }

        /* CAROUSEL SECTION */
        .explore-carousel-section {
            margin-top: 0;
            padding: 0;
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            z-index: 2;
        }

        .carousel-inner,
        .carousel-item,
        .carousel-inner img {
            height: 100vh;
            width: 100%;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 10px;
            bottom: 40px;
        }

        /* NAVBAR INSIDE CAROUSEL */
        .carousel-navbar {
            position: absolute;
            top: 20px;
            right: 30px;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.4);
            padding: 10px 20px;
            border-radius: 8px;
        }

        .carousel-navbar ul {
            display: flex;
            gap: 15px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .carousel-navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .carousel-navbar a:hover {
            text-decoration: underline;
        }

        .carousel-caption.custom-caption {
            bottom: 80px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        .carousel-caption.custom-caption h2 {
            font-size: 2.5rem;
            color: #fff;
        }

        .carousel-caption.custom-caption p {
            font-size: 1.2rem;
            color: #eee;
        }

        .left-center-caption {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            text-align: left;
            max-width: left;
            z-index: 10;
        }

        .left-center-caption h2 {
            font-size: 3rem;
            /* Ukuran besar untuk judul */
            font-weight: 700;
            /* Tebal */
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            margin-bottom: 10px;
        }

        .left-center-caption p {
            font-size: 1.5rem;
            /* Sedikit lebih besar untuk deskripsi */
            color: #eee;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.6);
        }



        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2.2rem;
            }

            .hero-text p {
                font-size: 1rem;
            }

            .hero-text a.btn-explore {
                width: 80%;
                display: inline-block;
            }

            .carousel-navbar ul {
                flex-direction: column;
                align-items: flex-end;
            }
        }
    </style>

    {{-- Video Background --}}
    <video class="video-bg" autoplay muted loop playsinline>
        <source src="{{ asset('video/pantaii.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    {{-- Konten Hero --}}
    <div class="hero-content text-center">
        <h1 class="display-4 fw-bold">Welcome to Seaside Symphony</h1>
        <p class="lead fw-bold">Your Digital Journey to the Wonders of Rembang</p>
        <a href="#explore" class="btn btn-dark fw-semibold">Let's Explore</a>
    </div>



    {{-- Carousel Section --}}
    <div id="explore" class="explore-carousel-section">
        {{-- Tampilkan navbar di dalam section ini --}}
        @include('components.navbar')

        <div id="beachCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/dampoawang.jpg') }}" class="d-block w-100" alt="Beach 1">
                    <div class="left-center-caption text-start">
                        <h2 class="fw-bold text-light">Experience Coastal Beauty</h2>
                        <p class="lead text-light">Unwind and relax on the serene shores of Rembang.</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('images/mangrove.jpg') }}" class="d-block w-100" alt="Beach 2">
                    <div class="left-center-caption text-start">
                        <h2 class="fw-bold text-light">Explore the Beauty</h2>
                        <p class="lead text-light">Enjoy the wonder of serene beaches and unforgettable coastal moments.</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('images/karangjahe.jpg') }}" class="d-block w-100" alt="Beach 3">
                    <div class="left-center-caption text-start">
                        <h2 class="fw-bold text-light">Adventure Awaits</h2>
                        <p class="lead text-light">Uncover hidden gems along the peaceful coastline of Rembang.</p>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#beachCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#beachCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
@endsection
