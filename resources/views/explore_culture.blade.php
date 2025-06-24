@extends('layout.template')

@section('title', 'Coastal Culture')

@push('body-class')
    culture-bg
@endpush

@section('styles')
<style>
    body.culture-bg {
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
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">Coastal Culture</h1>
    <p class="text-center">
        Rembang Regency boasts a rich and diverse cultural heritage. These cultures not only provide entertainment for the local community but also serve as attractions for visiting tourists.
    </p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mt-4">
        {{-- 1. Pathol Sarang --}}
        <div class="col">
            <div class="card shadow-sm">
                <div class="ratio ratio-4x3">
                    <img src="{{ asset('images/patholsarang.jpg') }}" class="card-img-top object-fit-cover" alt="Pathol Sarang">
                </div>
                <div class="card-body py-2 text-center">
                    <h6 class="card-title mb-1">
                        <a href="https://jatengprov.go.id/beritadaerah/pathol-sarang-tradisi-sejak-zaman-majapahit-yang-masih-eksis-di-rembang/" target="_blank" class="text-decoration-none">Pathol Sarang</a>
                    </h6>
                </div>
            </div>
            <div class="card border-0 shadow-sm mt-2 card-description">
                <div class="card-body small text-center p-2" style="height: 220px">
                    Pathol Sarang is a traditional wrestling performance from Rembang. It’s usually held during festivals and beachside events. The show celebrates strength and courage among fishermen. Crowds cheer loudly and build unity. Traditional music and chanting make the event lively. It is both a sport and a cultural heritage.
                </div>
            </div>
        </div>

        {{-- 2. Sedekah Laut --}}
        <div class="col">
            <div class="card shadow-sm">
                <div class="ratio ratio-4x3">
                    <img src="{{ asset('images/sedekahlaut.jpg') }}" class="card-img-top object-fit-cover" alt="Sedekah Laut">
                </div>
                <div class="card-body py-2 text-center">
                    <h6 class="card-title mb-1">
                        <a href="https://visitjawatengah.jatengprov.go.id/id/artikel/sedekah-laut-rembang-tradisi-masyarakat-pesisir" target="_blank" class="text-decoration-none">Sedekah Laut</a>
                    </h6>
                </div>
            </div>
            <div class="card border-0 shadow-sm mt-2 card-description">
                <div class="card-body small text-center p-2" style="height: 220px">
                    Sedekah Laut is a vibrant sea offering held annually in Rembang. Boats are decorated, and fishermen pray for safety and prosperity. The tradition brings unity and reflects coastal gratitude. Communities gather along the coast to witness the event. Music dance performances often accompany the day.
                </div>
            </div>
        </div>

        {{-- Tambahkan budaya lainnya dengan pola yang sama --}}
        <div class="col">
    <div class="card shadow-sm">
        <div class="ratio ratio-4x3">
            <img src="{{ asset('images/tarigandario.jpg') }}" class="card-img-top object-fit-cover" alt="Tari Gandario">
        </div>
        <div class="card-body py-2 text-center">
            <h6 class="card-title mb-1">
                <a href="https://memanggil.co/news-20151-lima-tarian-tradisional-rembang-cerminan-budaya-dan-tradisi-lokal" target="_blank" class="text-decoration-none">Tari Gandario</a>
            </h6>
        </div>
    </div>
    <div class="card border-0 shadow-sm mt-2 card-description">
        <div class="card-body small text-center p-2" style="height: 220px">
            Tari Gandario is a vibrant cultural dance performed in bright costumes. Youth showcase the moves with pride and music. The tradition brings spirit and unity to local celebrations. Each movement tells a story of bravery and pride. This dance reflects the beauty of harmony and cultural identity. It remains popular at local events.
        </div>
    </div>
</div>

<div class="col">
    <div class="card shadow-sm">
        <div class="ratio ratio-4x3">
            <img src="{{ asset('images/tong.jpg') }}" class="card-img-top object-fit-cover" alt="Tong Tong Klek">
        </div>
        <div class="card-body py-2 text-center">
            <h6 class="card-title mb-1">
                <a href="https://rembangkab.go.id/katakunci/tong-tong-klek/" target="_blank" class="text-decoration-none">Tong Tong Klek</a>
            </h6>
        </div>
    </div>
    <div class="card border-0 shadow-sm mt-2 card-description">
        <div class="card-body small text-center p-2" style="height: 220px">
            Tong Tong Klek features lively street parades with bamboo music and costumes. The festive rhythm fills the air. It is one of Rembang’s joyful cultural attractions. Children and adults dance in colorful attire. The sound of bamboo clappers echoes through the streets. It brings energy and happiness to the entire community.
        </div>
    </div>
</div>

<div class="col">
    <div class="card shadow-sm">
        <div class="ratio ratio-4x3">
            <img src="{{ asset('images/tariemprak.jpg') }}" class="card-img-top object-fit-cover" alt="Emprak">
        </div>
        <div class="card-body py-2 text-center">
            <h6 class="card-title mb-1">
                <a href="https://id.wikipedia.org/wiki/Tari_Emprak" target="_blank" class="text-decoration-none">Emprak</a>
            </h6>
        </div>
    </div>
    <div class="card border-0 shadow-sm mt-2 card-description">
        <div class="card-body small text-center p-2" style="height: 220px">
            Emprak is a cultural performance combining drama, dance, and costumes. Tales from folklore come alive on stage. It’s entertaining and meaningful for the community. Performers wear expressive costumes and face paint. Villagers often gather to enjoy the show outdoors. Emprak continues to preserve local stories and tradition.
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
