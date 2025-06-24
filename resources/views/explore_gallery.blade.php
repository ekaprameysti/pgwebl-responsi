@extends('layout.template')

@section('title', 'Gallery')

@push('body-class')
    gallery-bg
@endpush

@section('styles')
<style>
    body.gallery-bg {
        background: url('{{ asset('icons/bgg.png') }}') center / cover no-repeat fixed;
        background-color: #fdf7e3;
    }

    .card-description {
        transition: transform 0.3s ease;
        background-color: #f3d7aa;
        border-radius: 0.5rem;
    }

    .card-description:hover {
        transform: scale(1.05);
        z-index: 2;
    }
</style>
@endsection

@section('content')
<style>
    .gallery-card {
        border-radius: 0.75rem;
        overflow: hidden;
        transition: transform 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .gallery-card:hover {
        transform: translateY(-6px);
    }
    .gallery-img {
        object-fit: cover;
        height: 200px;
        width: 100%;
    }
    .gallery-caption {
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 6px 12px;
        position: absolute;
        bottom: 0;
        width: 100%;
        font-size: 0.95rem;
        text-align: center;
    }
</style>

<div class="container py-2">
    <h1 class="mb-1 text-center fw-bold">Gallery</h1>
    <p class="text-center">
        Welcome to our Gallery page! Here, we celebrate the vibrant culture and breathtaking landscapes of Rembang.
        Dive into an immersive visual journey through stunning photos capturing the essence of our coastal paradise.
    </p>

    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/mangrove.jpg') }}" alt="Cloudy Horizon" class="gallery-img">
                <div class="gallery-caption">Mangrove Bridge Trail</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/dampoawang.jpg') }}" alt="Pantai Dampo Awang" class="gallery-img">
                <div class="gallery-caption">Golden Horizon at Dampo Awang</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/karangjahe.jpg') }}" alt="Coastal View" class="gallery-img">
                <div class="gallery-caption">Karang Jahe Serenity</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/nyamplung.jpg') }}" alt="Cloudy Horizon" class="gallery-img">
                <div class="gallery-caption">Evening Swing Delight</div>
            </div>
        </div>
        <!-- Tambahkan item lainnya sesuai kebutuhan -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/splash1.jpeg') }}" alt="Sunset at the Hidden Beach" class="gallery-img">
                <div class="gallery-caption">Twilight Tranquility</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/swalan.jpg') }}" alt="Pantai Dampo Awang" class="gallery-img">
                <div class="gallery-caption">Glimpse of Coastal Life</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/splash.jpg') }}" alt="Coastal View" class="gallery-img">
                <div class="gallery-caption">Coastline Walk</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/pantai.jpeg') }}" alt="Sunset at the Hidden Beach" class="gallery-img">
                <div class="gallery-caption">Sunset Swing Bliss</div>
            </div>
        </div>
        <!-- Tambahkan item lainnya sesuai kebutuhan -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/dampoawangg.jpg') }}" alt="Sunset at the Hidden Beach" class="gallery-img">
                <div class="gallery-caption">Peaceful Jetty Moments</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/wates.jpg') }}" alt="Pantai Dampo Awang" class="gallery-img">
                <div class="gallery-caption">Barefoot Beach Calm</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/dasun.jpg') }}" alt="Coastal View" class="gallery-img">
                <div class="gallery-caption">Coastal View</div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative gallery-card">
                <img src="{{ asset('images/dampo.jpg') }}" alt="Cloudy Horizon" class="gallery-img">
                <div class="gallery-caption">Nature’s Corridor</div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-start">
        <a href="{{ route('explore') }}" class="btn btn-outline-primary">
            <i class="fa-solid fa-arrow-left"></i> Back to Explore
        </a>
    </div>
</div>
@endsection
