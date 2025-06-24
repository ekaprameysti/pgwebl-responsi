@extends('layout.template')

@section('title', 'Ulasan Pengunjung')

{{-- Tambahan Style untuk Background --}}
@section('styles')
<style>
    body {
        background: url('{{ asset('icons/bgg.png') }}') center / cover no-repeat fixed;
        background-color: #eef6ff;
    }

    .form-card,
    .review-list .card {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: .75rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .08);
    }

    /* Tambahkan margin agar tidak ketabrak navbar */
    main {
        padding-top: 0rem;
    }
</style>
@endsection

@section('content')
<div class="container my-2">
    <h2 class="mb-3 text-center">Visitor Reviews</h2>

    {{-- Ilustrasi atas --}}
    <div class="text-center mb-2">
        <img src="{{ asset('icons/user.png') }}" alt="Review Illustration" width="100">
    </div>

    {{-- Notifikasi info --}}
    <div class="alert alert-info small text-center">
        Please leave an honest and respectful review. We appreciate your feedback!
    </div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-card p-4 mb-2">
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf

            <h5 class="fw-semibold mb-2 text-center">
                <i class="fa-solid fa-umbrella-beach me-1 text-warning"></i> Form Review
            </h5>

            <div class="row">
                {{-- Pilih pantai --}}
                <div class="col-12 mb-2">
                    <label class="form-label fw-semibold">Beach to Review 🌊</label>
                    <select name="point_id" class="form-select @error('point_id') is-invalid @enderror" required>
                        <option value="">Select a beach</option>
                        @foreach ($pantais as $pantai)
                            <option value="{{ $pantai->id }}" {{ old('point_id') == $pantai->id ? 'selected' : '' }}>
                                {{ $pantai->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('point_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="col-12 mb-2">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required>
                    @error('user_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Ulasan --}}
                <div class="col-12 mb-2">
                    <label class="form-label fw-semibold">Review 💬</label>
                    <textarea name="content" rows="4" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Rating --}}
                <div class="col-12 mb-2">
                    <label class="form-label d-block fw-semibold">Rating ⭐</label>
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" class="btn-check" name="rating" id="rating-{{ $i }}" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                        <label class="btn btn-outline-warning" for="rating-{{ $i }}" title="{{ ['Buruk','Kurang','Cukup','Bagus','Sangat Bagus'][$i-1] }}">
                            <i class="fa-regular fa-star"></i>
                        </label>
                    @endfor
                    @error('rating')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-paper-plane me-1"></i> Submit Review
                    </button>
                </div>
            </div>
        </form>

        {{-- Tombol scroll ke daftar ulasan --}}
        <div class="text-center mt-4">
            <a href="#ulasanList" class="btn btn-outline-secondary">
                <i class="fa-solid fa-list"></i> View Review List
            </a>
        </div>
    </div>

    {{-- Daftar Ulasan --}}
    <div id="ulasanList" class="mt-5">
        <h4 class="mb-3">Review List</h4>

        {{-- Filter --}}
        <form method="GET" action="{{ route('reviews.index') }}" class="d-flex align-items-center gap-2 mb-3">
            <select name="pantai" class="form-select" onchange="this.form.submit()" style="max-width: 200px">
                <option value="">All</option>
                @foreach ($pantais as $pantai)
                    <option value="{{ $pantai->id }}" {{ request('pantai') == $pantai->id ? 'selected' : '' }}>
                        {{ $pantai->name }}
                    </option>
                @endforeach
            </select>
            <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary">Reset</a>
        </form>

        @if (request('pantai'))
            <p class="text-muted mb-2">
                Found {{ $reviews->count() }} Reviews for the beach
                <strong>{{ $pantais->firstWhere('id', request('pantai'))->name }}</strong>.
            </p>
        @endif

        <div class="review-list">
            @forelse ($reviews as $review)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 text-truncate" style="max-width: 50%">{{ $review->user_name }}</h5>
                            <small class="text-muted">
                                For the beach <strong>{{ $pantais->firstWhere('id', $review->point_id)->name ?? '-' }}</strong>
                                &ndash; {{ $review->created_at->format('d M Y') }}
                            </small>
                        </div>

                        {{-- Bintang --}}
                        <div class="text-warning mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $review->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                            @endfor
                        </div>

                        <p class="mb-0">{{ $review->content }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center">No reviews for this beach yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
