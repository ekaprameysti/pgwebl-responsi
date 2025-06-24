@extends('layout.template')

@section('title', 'Database')

@section('content')
    <div class="container mt-4 mb-4">
        <h2 class="mb-3">DATABASE</h2>

        {{-- ===== tombol filter ===== --}}
        <div class="btn-group mb-3" role="group" aria-label="Filter tables">
            <button class="btn btn-outline-primary filter-btn active" data-target="all">All</button>
            <button class="btn btn-outline-primary filter-btn" data-target="points">Beach Points</button>
            <button class="btn btn-outline-primary filter-btn" data-target="polylines">Distance Estimate</button>
            <button class="btn btn-outline-primary filter-btn" data-target="polygons">Coastal Locations</button>
        </div>

        {{-- ========= CARD POINTS ========= --}}
        <div id="card-points" class="card table-card">
            <div class="card-header text-center">
                <h4>Beach Points</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="pointstable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($points as $p)
                            <tr>
                                <td class="text-center">{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/' . $p->image) }}" width="160"
                                        class="d-block mx-auto" alt="">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ========= CARD POLYLINES ========= --}}
        <div id="card-polylines" class="card table-card mt-4">
            <div class="card-header text-center">
                <h4>Distance Estimate</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="polylinestable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($polylines as $p)
                            <tr>
                                <td class="text-center">{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/' . $p->image) }}" width="160"
                                        class="d-block mx-auto" alt="">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ========= CARD POLYGONS ========= --}}
        <div id="card-polygons" class="card table-card mt-4">
            <div class="card-header text-center">
                <h4>Coastal Locations</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="polygonstable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($polygons as $p)
                            <tr>
                                <td class="text-center">{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/' . $p->image) }}" width="160"
                                        class="d-block mx-auto" alt="">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- ========== DataTables ========== --}}
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    <style>
        /* Bungkus seluruh halaman database dengan pembungkus full-width */
        body.database-bg {
            /* ① */
            /* Ganti ke gambar apa pun di folder public/img */
            background: url('{{ asset('icons/bgg.png') }}') center / cover no-repeat fixed;
            /* Atur fallback warna jika gambar gagal dimuat */
            background-color: #e9f5ff;
        }

        /* Warna header biru pastel */
        table.dataTable thead th {
            background-color: #d6ecff !important;
            /* pastel blue */
            color: #003366 !important;
            /* dark navy text */
        }

        /* Opsional: warna hover baris */
        table.dataTable tbody tr:hover {
            background-color: #eef7ff !important;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        // Tambahkan class untuk background hanya di halaman ini
        document.body.classList.add('database-bg');

        new DataTable('#pointstable');
        new DataTable('#polylinestable');
        new DataTable('#polygonstable');

        $('.filter-btn').on('click', function() {
            const target = $(this).data('target');
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');

            if (target === 'all') {
                $('.table-card').show();
            } else {
                $('.table-card').hide();
                $('#card-' + target).show();
            }

            $('html,body').animate({
                scrollTop: $('#card-' + (target === 'all' ? 'points' : target)).offset().top - 70
            }, 300);
        });
    </script>
@endsection
