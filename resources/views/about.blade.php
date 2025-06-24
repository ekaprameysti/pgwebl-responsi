@extends('layout.template')

@section('title', 'About')

@section('content')
    <div class="container py-3">
        <div class="card shadow-lg border-0 rounded-4">

            {{-- Header --}}
            <div class="card-header bg-info text-white rounded-top-4 text-center">
                <h4><i class="fa-solid fa-circle-info me-2 text-center"></i>SEASIDE</h4>
            </div>

            {{-- Body --}}
            <div class="card-body fs-6 px-4 text-start">

                <h5 class="mt-2 mb-2">🗺️ Apa itu SEASIDE?</h5>
                <p>
                    <strong>SEASIDE</strong> adalah singkatan dari Beaches Exploration and Spatial Information for District Rembang, yaitu sebuah platform digital interaktif yang dirancang untuk menyajikan data
                    geografis dan potensi wilayah Kabupaten Rembang secara visual, dinamis, dan mudah diakses.
                </p>
                <p>
                    Dibangun dengan teknologi <strong>Leaflet.js</strong> dan <strong>Laravel Framework</strong>, SEASIDE
                    memfasilitasi pengguna dalam:
                </p>
                <ul class="mb-4">
                    <li>📍 Menampilkan titik lokasi, jalur, dan wilayah potensial di peta interaktif.</li>
                    <li>🗂️ Mengelola data spasial (point, polyline, polygon) beserta deskripsi dan foto.</li>
                    <li>🔍 Melakukan eksplorasi dan pencarian informasi berdasarkan lokasi, jenis data, atau kategori
                        potensi.</li>
                    <li>📸 Melampirkan dokumentasi visual untuk setiap data spasial yang diunggah.</li>
                    <li>🧭 Mempermudah instansi, masyarakat, dan pengembang dalam mengambil keputusan berbasis lokasi.</li>
                </ul>

                <h5 class="mb-2">🎯 Tujuan Utama SEASIDE</h5>
                <ul class="mb-4">
                    <li><strong>Digitalisasi Informasi Wilayah:</strong> Mengganti sistem manual dengan penyimpanan dan
                        pemetaan digital yang mudah dipelihara.</li>
                    <li><strong>Transparansi dan Aksesibilitas:</strong> Menyediakan akses terbuka terhadap informasi
                        potensi daerah, baik bagi pemerintah maupun masyarakat umum.</li>
                    <li><strong>Dukungan Keputusan Strategis:</strong> Membantu dalam perencanaan pembangunan, pengelolaan
                        sumber daya, serta mitigasi risiko wilayah.</li>
                </ul>

                <h5 class="mb-2">⚙️ Fitur Utama SEASIDE</h5>
                <ul>
                    <li>📌 CRUD untuk Point, Polyline, dan Polygon</li>
                    <li>🖼️ Upload gambar dan pratinjau otomatis</li>
                    <li>📍 Peta interaktif menggunakan Leaflet</li>
                    <li>🧾 Sistem manajemen backend berbasis Laravel</li>
                    <li>🌐 Tampilan responsif dan modern</li>
                </ul>
            </div>

            {{-- Footer --}}
            <div class="modal-footer px-4 py-3 bg-light rounded-bottom-4 d-flex justify-content-end">
                <button type="button" onclick="goBackOrHome()" class="btn btn-back-custom">
                    <i class="fa-solid fa-arrow-left me-2"></i> Back to Previous
                </button>
            </div>
        </div>
    </div>

    {{-- Script untuk tombol kembali --}}
    <script>
        function goBackOrHome() {
            if (document.referrer) {
                window.history.back();
            } else {
                window.location.href = "{{ route('home') }}";
            }
        }
    </script>

    {{-- Custom Styling --}}
    <style>
        .btn-back-custom {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 18px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-back-custom:hover {
            background-color: #5a6268;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-1px);
        }
    </style>


    {{-- Floating Info Button --}}
    <button class="btn btn-primary position-fixed rounded-circle shadow"
        style="bottom: 30px; right: 30px; width: 52px; height: 52px; z-index: 1050;" data-bs-toggle="modal"
        data-bs-target="#aboutCreatorModal" title="Tentang Pembuat">
        <i class="fas fa-info"></i>
    </button>


    <!-- Modal: Info Pembuat Website -->
    <div class="modal fade" id="aboutCreatorModal" tabindex="-1" aria-labelledby="aboutCreatorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow rounded-4">
                <div class="modal-header bg-info text-white rounded-top-4">
                    <h5 class="modal-title" id="aboutCreatorModalLabel">
                        <i class="fas fa-user-circle me-2"></i> Meet the Creator
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('storage/profile.png') }}" alt="Foto Profil"
                        class="rounded-circle mb-3 shadow-sm border"
                        style="width: 130px; height: 130px; object-fit: cover;">

                    <div class="text-center mt-2">
                        <h5 class="fw-semibold mb-1">Eka Nafi' Prameysti</h5>
                        <span class="badge bg-secondary mb-2">23/515913/SV/22642</span>
                        <div class="text-muted mb-2" style="font-size: 0.95rem;">
                            <i class="fa-regular fa-calendar me-1"></i> Tahun Akademik <strong>2025</strong> || SIG <strong>23</strong>
                        </div>
                        <p class="fst-italic text-dark mt-3 mb-0" style="font-size: 0.85rem;">

                            “Membangun peta bukan hanya merancang lokasi, tapi menanam makna dalam setiap koordinat.”

                        </p>

                    </div>



                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="mailto:ekaprameysti@gmail.com" class="btn btn-outline-success btn-sm" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="https://github.com/ekaprameysti" target="_blank" class="btn btn-outline-dark btn-sm"
                            title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://linkedin.com/in/eka-nafi-prameysti" target="_blank"
                            class="btn btn-outline-primary btn-sm" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://instagram.com/ekaprameysti" target="_blank" class="btn btn-outline-danger btn-sm"
                            title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
