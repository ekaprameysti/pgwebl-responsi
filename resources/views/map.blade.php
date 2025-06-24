@extends('layout.template')

@section('styles')
    <!-- Font Awesome CDN -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-5As1z0...VtaIuHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">




    <!-- Leaflet & Draw -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
@endsection



@section('content')
    <div id="map"></div>

    <!-- Modal Create Point-->
    <div class="modal fade" id="createpointModal" tabindex="-1" aria-labelledby="createPointLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow rounded-4 border-0">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-semibold" id="createPointLabel">
                        <i class="bi bi-geo-alt-fill me-2"></i> Create New Point
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body px-4 py-3">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name"
                                placeholder="Enter point name..." required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control shadow-sm" id="description" name="description" rows="3"
                                placeholder="Describe this location..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_point" class="form-label fw-semibold">Geometry</label>
                            <textarea class="form-control shadow-sm" id="geom_point" name="geom_point" rows="3"
                                placeholder="Paste geometry coordinates here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold">Photo</label>
                            <input type="file" class="form-control shadow-sm" id="image_point" name="image"
                                accept="image/*"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <div class="d-flex justify-content-center mt-3">
                                <img src="" id="preview-image-point" class="img-fluid rounded-3 shadow-sm border"
                                    width="400" alt="Image Preview" style="max-height: 220px; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4 py-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save-fill me-1"></i> Save Point
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Create Polyline -->
    <div class="modal fade" id="createpolylineModal" tabindex="-1" aria-labelledby="createPolylineLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow rounded-4 border-0">
                <!-- header -->
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-semibold" id="createPolylineLabel">
                        <i class="bi bi-signpost-split-fill me-2"></i> Create New Polyline
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- form -->
                <form method="POST" action="{{ route('polylines.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body px-4 py-3">
                        <!-- name -->
                        <div class="mb-3">
                            <label for="name_polyline" class="form-label fw-semibold">Name</label>
                            <input type="text" id="name_polyline" name="name" class="form-control shadow-sm"
                                placeholder="Enter polyline name…" required>
                        </div>
                        <!-- description -->
                        <div class="mb-3">
                            <label for="description_polyline" class="form-label fw-semibold">Description</label>
                            <textarea id="description_polyline" name="description" rows="3" class="form-control shadow-sm"
                                placeholder="Describe this route…"></textarea>
                        </div>
                        <!-- geometry -->
                        <div class="mb-3">
                            <label for="geom_polyline" class="form-label fw-semibold">Geometry</label>
                            <textarea id="geom_polyline" name="geom_polyline" rows="3" class="form-control shadow-sm"
                                placeholder="Paste geometry coordinates here…"></textarea>
                        </div>
                        <!-- image -->
                        <div class="mb-3">
                            <label for="image_polyline" class="form-label fw-semibold">Photo</label>
                            <input type="file" id="image_polyline" name="image" accept="image/*"
                                class="form-control shadow-sm"
                                onchange="document.getElementById('preview-image-polyline').src =
                            window.URL.createObjectURL(this.files[0])">
                            <div class="d-flex justify-content-center mt-3">
                                <img id="preview-image-polyline" src=""
                                    class="img-fluid rounded-3 shadow-sm border"
                                    style="max-height:220px; object-fit:cover;" width="400" alt="Image Preview">
                            </div>
                        </div>
                    </div>
                    <!-- footer -->
                    <div class="modal-footer px-4 py-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save-fill me-1"></i> Save Polyline
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Create Polygon -->
    <div class="modal fade" id="createpoylgonModal" {{-- id tetap sama --}} tabindex="-1"
        aria-labelledby="createPolygonLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow rounded-4 border-0">
                <!-- Header -->
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-semibold" id="createPolygonLabel">
                        <i class="bi bi-hexagon-fill me-2"></i> Create New Polygon
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Form -->
                <form method="POST" action="{{ route('polygons.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body px-4 py-3">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" id="name" name="name" class="form-control shadow-sm"
                                placeholder="Enter polygon name…" required>
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea id="description" name="description" rows="3" class="form-control shadow-sm"
                                placeholder="Describe this area…"></textarea>
                        </div>
                        <!-- Geometry -->
                        <div class="mb-3">
                            <label for="geom_polygon" class="form-label fw-semibold">Geometry</label>
                            <textarea id="geom_polygon" name="geom_polygon" rows="3" class="form-control shadow-sm"
                                placeholder="Paste geometry coordinates here…"></textarea>
                        </div>
                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image_polygon" class="form-label fw-semibold">Photo</label>
                            <input type="file" id="image_polygon" name="image" accept="image/*"
                                class="form-control shadow-sm"
                                onchange="document.getElementById('preview-image-polygon').src =
                            window.URL.createObjectURL(this.files[0])">
                            <div class="d-flex justify-content-center mt-3">
                                <img id="preview-image-polygon" src=""
                                    class="img-fluid rounded-3 shadow-sm border"
                                    style="max-height:220px; object-fit:cover;" width="400" alt="Image Preview">
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="modal-footer px-4 py-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save-fill me-1"></i> Save Polygon
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>


    <script>
        var map = L.map('map').setView([-6.742094439725703, 111.46193981250993], 12);

        /* =========================================================
         *  BASEMAPS
         * ========================================================= */
        //  ▸ OpenStreetMap default
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        });

        //  ▸ Esri World Imagery (satellite)
        var esriSat = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/' +
            'World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: 'Tiles &copy; Esri'
            }
        );

        //  ▸ OpenTopoMap (hillshade & kontur)
        var opentopo = L.tileLayer(
            'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                maxZoom: 17,
                attribution: '© OpenTopoMap (CC-BY-SA)'
            }
        );

        //  ▸ EsriTopo (rincian tinggi, kontur, jalan, dll)
        var esriTopo = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/' +
            'World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles © Esri'
            }
        );

        //  ▸ CartoDB Positron (mode terang)
        var positron = L.tileLayer(
            'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap & CARTO',
                subdomains: 'abcd',
                maxZoom: 19
            }
        );

        //  ▸ CartoDB Dark Matter (mode malam)
        var darkMatter = L.tileLayer(
            'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                maxZoom: 19,
                attribution: '&copy; CARTO'
            }
        );

        // ──────────────────────────────────────────────────────────
        //  Pasang salah satu basemap sebagai layer awal
        osm.addTo(map);


        /* Digitize Function */
        var drawnItems = new L.FeatureGroup(); //digunakan untuk menampung feature-feature yang digambar
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            // console.log(objectGeometry);

            if (type === 'polyline') {
                console.log("Create " + type);

                $('#geom_polyline').val(objectGeometry);
                // memunculkan modal create polyline
                $('#createpolylineModal').modal('show');
            } else if (type === 'polygon' || type === 'rectangle') {

                console.log("Create " + type);

                $('#geom_polygon').val(objectGeometry);
                //memunculkan modal create polygon
                $('#createpoylgonModal').modal('show');


            } else if (type === 'marker') {
                console.log("Create " + type);


                $('#geom_point').val(objectGeometry);

                //memunculkan modal create marker
                $('#createpointModal').modal('show');


            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        // GeoJSON Points
        var point = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                var waveIcon = L.icon({
                    iconUrl: '/icons/wavee.png', // Pastikan path ini benar ke file ikonnya
                    iconSize: [35, 35], // Ukuran ikon
                    iconAnchor: [16, 32], // Titik anchor ke peta
                    popupAnchor: [0, -30] // Posisi popup terhadap ikon
                });

                return L.marker(latlng, {
                    icon: waveIcon
                });
            },
            onEachFeature: function(feature, layer) {
                var routedelete = "{{ route('points.destroy', ':id') }}".replace(':id', feature.properties.id);
                var routeedit = "{{ route('points.edit', ':id') }}".replace(':id', feature.properties.id);

            var popupContent = `
<div class="card shadow-sm border-0" style="width: 260px;">

    <!-- NAMA -->
    <div class="card-body pb-0">
        <h6 class="fw-bold mb-2">
            <i class="fa-solid fa-location-dot text-primary me-1"></i> ${feature.properties.name}
        </h6>
    </div>

    <!-- GAMBAR -->
    <img src="{{ asset('storage/images/') }}/${feature.properties.image}"
        class="img-fluid rounded"
        style="object-fit: cover; height: 140px;"
        alt="${feature.properties.name}">

    <!-- DESKRIPSI -->
    <div class="card-body pt-2 pb-0">
        <p class="small mb-3" style="max-height: 4.2rem; overflow: hidden;">
            ${feature.properties.description ?? '<em class="text-muted">Belum ada deskripsi.</em>'}
        </p>

        <!-- TOMBOL AKSI -->
        <div class="d-flex justify-content-between mb-3">
            <a href="${routeedit}" class="btn btn-sm btn-outline-warning w-50 me-1" title="Edit">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form method="POST" action="${routedelete}" class="w-50 ms-1"
                  onsubmit="return confirm('Yakin ingin menghapus titik ini?')">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-sm btn-outline-danger w-100" title="Hapus">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>

        <!-- INFO: Tanggal & Pembuat di kanan -->
        <div class="border-top pt-2 pb-1 text-end small">
            <div class="text-muted mb-1">
                <i class="fa-regular fa-calendar me-1"></i> ${feature.properties.created_at.split('T')[0]}
            </div>
            <div>
                <span class="badge bg-primary">
                    <i class="fa-regular fa-user me-1"></i>${feature.properties.user_created}
                </span>
            </div>
        </div>
    </div>
</div>`;




                layer.bindPopup(popupContent);
                layer.bindTooltip(feature.properties.name);
            }
        });

        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });


        // GeoJSON Polylines
        var polyline = L.geoJson(null, {
            style: {
                color: '#FF8C00', // warna oranye
                weight: 4,
                opacity: 10
            },
            onEachFeature: function(feature, layer) {

                //-- rute edit & delete (ganti :id dengan ID feature)
                let routedelete = "{{ route('polylines.destroy', ':id') }}".replace(':id', feature.properties
                    .id);
                let routeedit = "{{ route('polylines.edit', ':id') }}".replace(':id', feature.properties.id);

                let popupContent = `
<div class="card shadow-sm border-0" style="width: 270px">
    <!-- Header -->
    <div class="card-body pb-0">
        <h6 class="fw-bold mb-1">
            <i class="fa-solid fa-route me-1" style="color: #f3a848;"></i> ${feature.properties.name}
        </h6>

        <p class="small mb-2">
            ${feature.properties.description ?? '<em class="text-muted">Tidak ada deskripsi.</em>'}
        </p>

        <ul class="list-unstyled mb-2 small text-muted">
            <li>
                <i class="fa-solid fa-ruler-horizontal me-1"></i>
                Panjang: <strong>${feature.properties.length_km.toFixed(2)} km</strong>
            </li>
        </ul>
    </div>

    <!-- Gambar -->
    <img src="{{ asset('storage/images/') }}/${feature.properties.image}"
        class="img-fluid rounded-bottom shadow-sm"
        style="object-fit: cover; height: 160px;"
        alt="Foto Rute">

    <!-- Aksi -->
    <div class="card-body border-top pt-2">
        <div class="d-flex justify-content-between mb-2">
            <a href="${routeedit}" class="btn btn-sm btn-outline-warning w-50 me-1" title="Edit">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form method="POST" action="${routedelete}" class="w-50 ms-1"
                onsubmit="return confirm('Yakin ingin menghapus rute ini?')">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-sm btn-outline-danger w-100" title="Hapus">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>

        <!-- Info Dibuat -->
        <div class="text-end small text-muted border-top pt-2">
            <div class="mb-1">
                <i class="fa-regular fa-calendar me-1"></i> ${feature.properties.created_at.split('T')[0]}
            </div>
            <div>
                <span class="badge" style="background-color: #f3a848; color: #000;">
                    <i class="fa-regular fa-user me-1"></i>${feature.properties.user_created}
                </span>
            </div>
        </div>
    </div>
</div>`;


                //-- ikat popup & tooltip
                layer.bindPopup(popupContent);
                layer.bindTooltip(feature.properties.name);
            }
        });

        //-- ambil data JSON & tambahkan ke map
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            //map.addLayer(polyline);
        });

        // GeoJSON Polygons
        var polygon = L.geoJson(null, {
            style: {
                color: '#004d00', // border (bisa #006400 atau #2E8B57 juga)
                fillColor: '#2E8B57', // isi hijau tua
                fillOpacity: 10,
                weight: 4
            },
            onEachFeature: function(feature, layer) {

                //– rute edit & delete
                let routedelete = "{{ route('polygons.destroy', ':id') }}".replace(':id', feature.properties
                    .id);
                let routeedit = "{{ route('polygons.edit', ':id') }}".replace(':id', feature.properties.id);

                let popupContent = `
<div class="card shadow-sm border-0" style="width: 270px">
    <!-- Header -->
    <div class="card-body pb-0">
        <h6 class="fw-bold mb-1">
            <i class="fa-solid fa-draw-polygon text-success me-1"></i> ${feature.properties.name}
        </h6>

        <p class="small mb-2">
            ${feature.properties.description ?? '<em class="text-muted">Tidak ada deskripsi.</em>'}
        </p>

        <ul class="list-unstyled mb-2 small text-muted">
            <li>
                <i class="fa-solid fa-vector-square me-1"></i>
                Luas: <strong>${feature.properties.luas_km2.toFixed(2)} km²</strong>
            </li>
        </ul>
    </div>

    <!-- Gambar -->
    <img src="{{ asset('storage/images/') }}/${feature.properties.image}"
         class="img-fluid rounded-bottom shadow-sm"
         style="object-fit: cover; height: 160px;"
         alt="Foto Area">

    <!-- Aksi -->
    <div class="card-body border-top pt-2">
        <div class="d-flex justify-content-between mb-2">
            <a href="${routeedit}" class="btn btn-sm btn-outline-warning w-50 me-1" title="Edit">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form method="POST" action="${routedelete}" class="w-50 ms-1"
                  onsubmit="return confirm('Yakin ingin menghapus area ini?')">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-sm btn-outline-danger w-100" title="Hapus">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>

        <!-- Info Dibuat (Vertical layout) -->
        <div class="text-end mt-3">
            <div class="text-muted small mb-1">
                <i class="fa-regular fa-calendar me-1"></i> ${feature.properties.created_at.split('T')[0]}
            </div>
            <span class="badge bg-success text-white">
                <i class="fa-regular fa-user me-1"></i> ${feature.properties.user_created}
            </span>
        </div>
    </div>
</div>`;




                //– ikat popup & tooltip
                layer.bindPopup(popupContent);
                layer.bindTooltip(feature.properties.name);
            }
        });

        //– ambil data & tambahkan ke peta
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        //GeoJSON Wilayah Rembang
        var rembangArea = L.geoJson(null, {
            style: {
                color: "#b79b64", // warna batas
                weight: 2,
                opacity: 1,
                fillColor: "#d9cba3", // warna isi
                fillOpacity: 0.3
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties && feature.properties.name) {
                    layer.bindPopup(`<strong>Wilayah:</strong> ${feature.properties.name}`);
                }
            }
        });

        // Load file GeoJSON dari public folder
        $.getJSON("/geojson/rembang_kec.geojson", function(data) {
            rembangArea.addData(data);
            //map.addLayer(rembangArea);
        });

        // GeoJSON Jalan (Polyline)
        var jalanLayer = L.geoJSON(null, {
            style: {
                color: "#d87c2d",
                weight: 3
            },
            // Style
            style: function(feature) {
                var color, weight;
                switch (feature.properties.REMARK) {
                    case 'Jalan Kolektor':
                        color = 'red';
                        weight = 4;
                        break;
                    case 'Jalan Lokal':
                        color = 'red';
                        weight = 2.8;
                        break;
                    case 'Jalan Lain':
                        color = 'yellow';
                        weight = 2;
                        break;
                    default:
                        color = 'yellow';
                        weight = 0.8;
                }
                return {
                    color: color,
                    opacity: 1,
                    weight: weight,
                };
            },
            // onEachFeature
            onEachFeature: function(feature, layer) {
                // variable popup content
                var popup_content = "<table class='table table-striped table-bordered'>" +
                    "<tr><th>FUNGSI</th><td>" + feature.properties.REMARK + "</td></tr>" +
                    "<tr><th>PANJANG (M)</th><td>" + feature.properties.FOCAL_LENGTH;

                layer.on({
                    click: function(e) {
                        //jalan.bindPopup(popup_content);
                        // Menampilkan feature modal
                        $("#featureModalTitle").html("Jaringan Jalan");
                        $("#featureModalBody").html(popup_content);
                        $("#featureModal").modal("show");
                    },
                    mouseover: function(e) {
                        jalan.bindTooltip(feature.properties.REMARK, {
                            direction: "auto",
                            sticky: true,
                        });
                    },
                });
            },
            onEachFeature: function(feature, layer) {
                layer.bindPopup(`<strong>Jalan:</strong> ${feature.properties.name || 'Tanpa nama'}`);
                layer.bindTooltip(feature.properties.name || 'Jalan');
            }
        });

        // Load GeoJSON Jalan (ganti URL dengan lokasi sebenarnya jika pakai file lokal/public storage)
        $.getJSON("/geojson/jalan.geojson", function(data) {
            jalanLayer.addData(data);
            //map.addLayer(jalanLayer);
        });


        // // GeoJSON Titik Pantai (Point)
        // var titikPantaiLayer = L.geoJSON(null, {
        //     pointToLayer: function(feature, latlng) {
        //         return L.circleMarker(latlng, {
        //             radius: 7,
        //             fillColor: "#0077b6",
        //             color: "#ffffff",
        //             weight: 2,
        //             opacity: 1,
        //             fillOpacity: 0.8
        //         });
        //     },
        //     onEachFeature: function(feature, layer) {
        //         layer.bindPopup(`<strong>Pantai:</strong> ${feature.properties.name || 'Tanpa nama'}`);
        //         layer.bindTooltip(feature.properties.name || 'Titik Pantai');
        //     }
        // });

        // $.getJSON("/geojson/pantai.geojson", function(data) {
        //     titikPantaiLayer.addData(data);
        //     map.addLayer(titikPantaiLayer);
        // });




        /* ---------- CONTROL LAYER ---------- */

        // 1) Daftar base-map & overlay
        var baseMaps = {
            "OpenStreetMap": osm,
            "Esri Satellite": esriSat,
            "Esri Topo": esriTopo,
            "OpenTopoMap": opentopo,
            "Carto Light": positron,
            "Dark Matter": darkMatter
        };

        var overlayMaps = {
            "Beach Points": point,
            "Distance Estimate": polyline,
            "Coastal Locations": polygon,
            "Administrative Boundaries": rembangArea,
            "Rembang Roads": jalanLayer,
            //"Titik Pantai": titikPantaiLayer
        };

        // 2) Tambahkan layer-control ke peta
        var layerControl = L.control.layers(baseMaps, overlayMaps, {
            collapsed: false
        }).addTo(map);

        // 3) Tambahkan judul “Base Map” & “Geometry” secara permanen, dengan teks rata tengah
        (function addPermanentTitles(ctrl) {

            // DOM kotak layer
            const container = ctrl.getContainer();

            // elemen <form> untuk base-map & overlay
            const baseList = container.querySelector('.leaflet-control-layers-base');
            const overList = container.querySelector('.leaflet-control-layers-overlays');

            // fungsi buat/buat-ulang label
            function placeLabels() {
                if (baseList && !baseList.querySelector('.layer-label-base')) {
                    const lbl = document.createElement('div');
                    lbl.className = 'layer-label-base';
                    lbl.textContent = 'Base Map';
                    lbl.style = `
                padding:5px 10px;
                font-weight:600;
                font-size:13px;
                color:#444;
                text-align:center;
            `;
                    baseList.prepend(lbl);
                }
                if (overList && !overList.querySelector('.layer-label-ov')) {
                    const lbl = document.createElement('div');
                    lbl.className = 'layer-label-ov';
                    lbl.textContent = 'Geometry';
                    lbl.style = `
                padding:5px 10px;
                font-weight:600;
                font-size:13px;
                color:#444;
                text-align:center;
            `;
                    overList.prepend(lbl);
                }
            }

            // panggil sekali setelah kotak dibuat
            placeLabels();

            // patch metode _update supaya label tetap muncul saat leaflet refresh
            const originalUpdate = ctrl._update;
            ctrl._update = function() {
                originalUpdate.call(this);
                placeLabels();
            };

        })(layerControl);
    </script>
@endsection
