@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
@endsection


@section('content')
    <div id="map"></div>

    <!-- Modal Edit Point -->
    <div class="modal fade" id="editpointModal" tabindex="-1" aria-labelledby="editPointLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow rounded-4 border-0">

                <!-- Header -->
                <div class="modal-header bg-warning text-dark rounded-top-4">
                    <h5 class="modal-title fw-semibold" id="editPointLabel">
                        <i class="bi bi-pencil-square me-2"></i> Edit Point
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('points.update', $id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="modal-body px-4 py-3">

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name"
                                placeholder="Edit point name..." required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control shadow-sm" id="description" name="description" rows="3"
                                placeholder="Update point description..."></textarea>
                        </div>

                        <!-- Geometry -->
                        <div class="mb-3">
                            <label for="geom_point" class="form-label fw-semibold">Geometry</label>
                            <textarea class="form-control shadow-sm" id="geom_point" name="geom_point" rows="3"
                                placeholder="Edit geometry coordinates..."></textarea>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image_point" class="form-label fw-semibold">Photo</label>
                            <input type="file" class="form-control shadow-sm" id="image_point" name="image"
                                accept="image/*"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <div class="d-flex justify-content-center mt-3">
                                <img src="" id="preview-image-point"
                                    class="img-fluid rounded-3 shadow-sm border" width="400" alt="Image Preview"
                                    style="max-height:220px; object-fit:cover;">
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer px-4 py-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save2-fill me-1"></i> Update Point
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
        var map = L.map('map').setView([-2.577130644086869, 140.51686145200668], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup(); //digunakan untuk menampung feature-feature yang digambar
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: false,
            edit: {
                featureGroup: drawnItems,
                edit: true,
                remove: false
            }
        });

        map.addControl(drawControl);

        map.on('draw:edited', function(e) {
            var layers = e.layers;

            layers.eachLayer(function(layer) {
                var drawnJSONObject = layer.toGeoJSON();
                console.log(drawnJSONObject);

                var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);
                console.log(objectGeometry);

                // layer properties
                var properties = drawnJSONObject.properties;
                console.log(properties);

                drawnItems.addLayer(layer);

                //menampilkan data ke dalam modal
                $('#name').val(properties.name);
                $('#description').val(properties.description);
                $('#geom_point').val(objectGeometry);
                $('#preview-image-point').attr('src', "{{ asset('storage/images') }}/" + properties.image);

                //menampilkan modal edit
                $('#editpointModal').modal('show');
            });
        });

        //GeoJSON Points
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                //memasukkan layer point ke dalam drawnItems
                drawnItems.addLayer(layer);


                var objectGeometry = Terraformer.geojsonToWKT(feature.geometry);


                layer.on({
                    click: function(e) {
                        //menampilkan data ke dalam modal
                        $('#name').val(feature.properties.name);
                        $('#description').val(feature.properties.description);
                        $('#geom_point').val(objectGeometry);
                        $('#preview-image-point').attr('src', "{{ asset('storage/images') }}/" +
                            feature.properties.image);

                        //menampilkan modal edit
                        $('#editpointModal').modal('show');
                    },
                });
            },
        });
        $.getJSON("{{ route('api.point', $id) }}", function(data) {
            point.addData(data);
            map.addLayer(point);
            map.fitBounds(point.getBounds(), {
                padding: [100, 100]
            });
        });
    </script>
@endsection
