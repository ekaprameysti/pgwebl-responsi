@extends('layout.template')

@section('title', 'Explore Facilities')

@push('body-class')
    facilities-bg
@endpush

@section('styles')
<style>
    body.facilities-bg {
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
        .card-description {
            transition: transform 0.3s ease;
        }

        .card-description:hover {
            transform: scale(1.05);
            z-index: 2;
        }

        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
        }
    </style>
    <div class="container py-5">
        <h1 class="mb-4 text-center fw-bold">Public Facilities</h1>
        <p class="text-center">
            Discover the public infrastructure and amenities that support tourism and coastal life in Rembang. These
            facilities ensure comfort and convenience for visitors while highlighting the development along the shoreline.
        </p>

        <!-- 15 facilities, 3 rows × 5 columns on large screens -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mt-4">
            <!-- 1 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/parkir.jpg" class="card-img-top object-fit-cover" alt="Parking Area">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Parking Area</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Dedicated parking areas are provided near major beaches to accommodate visitors' vehicles. These
                        facilities make access easier and ensure traffic is well‑managed, especially during peak holidays.
                    </div>
                </div>
            </div>
            <!-- 2 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/toilet.jpeg" class="card-img-top object-fit-cover" alt="Public Toilets">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Public Toilets</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Well‑maintained restrooms are available for beach visitors. Cleaned regularly and accessible to all,
                        they enhance comfort during your seaside stay.
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/gazebo.jpg" class="card-img-top object-fit-cover" alt="Rest Gazebos">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Rest Gazebos</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Shaded gazebos provide a cosy spot for relaxing, picnicking, or enjoying the cool sea breeze after
                        swimming or strolling along the shore.
                    </div>
                </div>
            </div>
            <!-- 4 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/potospot.jpg" class="card-img-top object-fit-cover" alt="Wi‑Fi Spot">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Photo Spot</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Discover scenic beach locations with stunning views, iconic landmarks, and picture-perfect angles. Whether it's white sands, sunset backdrops, these spots are ideal for your snapshots.
                    </div>
                </div>
            </div>
            <!-- 5 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/rental.jpg" class="card-img-top object-fit-cover" alt="Souvenir Stalls">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Souvenir Stalls</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Local stalls sell crafts, snacks, and keepsakes, letting visitors bring home a slice of Rembang’s
                        coastal charm while supporting the local economy.
                    </div>
                </div>
            </div>
            <!-- 6 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/papan.jpg" class="card-img-top object-fit-cover" alt="Information Boards">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Information Boards</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Clear signage and maps help visitors navigate beaches, learn about local culture, and stay informed
                        on environmental guidelines and safety tips.
                    </div>
                </div>
            </div>
            <!-- 7 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/lodging.jpg" class="card-img-top object-fit-cover" alt="First Aid Posts" >
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Lodge</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        This beachside lodge offers a tranquil atmosphere with direct ocean views, the sound of waves, and fresh coastal air. Each room is designed with a tropical touch and complete with cozy beds.
                    </div>
                </div>
            </div>
            <!-- 8 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/play.jpg" class="card-img-top object-fit-cover" alt="Playgrounds">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Playgrounds</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Safe and fun play areas keep children entertained, making Rembang’s beaches more family‑friendly and
                        enjoyable for visitors of all ages.
                    </div>
                </div>
            </div>
            <!-- 9 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/musholla.jpg" class="card-img-top object-fit-cover" alt="Prayer Rooms">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Prayer Rooms</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Clean, accessible prayer facilities allow Muslim visitors to perform worship comfortably without
                        leaving the beach area.
                    </div>
                </div>
            </div>
            <!-- 10 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/boardwalk.jpg" class="card-img-top object-fit-cover" alt="Rinse Showers">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Boardwalk</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        This boardwalk is a scenic wooden pathway stretching along the shoreline, designed for visitors and locals to enjoy the beauty of the sea.
                    </div>
                </div>
            </div>
            <!-- 11 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/security.jpg" class="card-img-top object-fit-cover" alt="Security Posts">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Security Posts</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Security staff monitor beach areas to ensure order and safety. Their presence adds peace of mind for
                        both tourists and locals.
                    </div>
                </div>
            </div>
            <!-- 12 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/tower.jpg" class="card-img-top object-fit-cover" alt="Lifeguard Stations">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Lifeguard Stations</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Professional lifeguards stand by to respond to water emergencies. They help ensure swimmers’ safety
                        during beach visits.
                    </div>
                </div>
            </div>
            <!-- 13 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/trashbin.jpg" class="card-img-top object-fit-cover" alt="Trash Bins">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Trash Bins</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Strategically placed bins encourage cleanliness and environmental responsibility, helping keep
                        Rembang’s beaches litter‑free.
                    </div>
                </div>
            </div>
            <!-- 14 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/kios.jpg" class="card-img-top object-fit-cover" alt="Food Courts">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Food Courts</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Food courts offer a variety of local dishes and refreshments, allowing visitors to enjoy Rembang’s
                        culinary delights by the sea.
                    </div>
                </div>
            </div>
            <!-- 15 -->
            <div class="col">
                <div class="card shadow-sm hover-lift">
                    <div class="ratio ratio-4x3">
                        <img src="/images/boardinfo.jpg" class="card-img-top object-fit-cover" alt="Directional Signs">
                    </div>
                    <div class="card-body py-2 text-center">
                        <h6 class="card-title mb-1">Directional Signs</h6>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-2 card-description" style="background-color: #f3d7aa;">
                    <div class="card-body small text-center p-2" style="height: 140px">
                        Directional signage makes it easy for tourists to find key spots such as parking, restrooms, and
                        scenic viewpoints efficiently.
                    </div>
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
