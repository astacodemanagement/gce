@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@push('css')
    <style>
        .hero-section {
            background-image: url('https://jet.co.id/indexUploads/images/20201124/b8bd61219f77b628da664f6ac02a0844.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .news-section {
            margin: 50px 0;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            margin: 10px 0;
            color: #555;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <div class="hero-section">
        <h1>{{ $subtitle }}</h1>
    </div>

    <div class="container news-section">
        <div class="row">
            @foreach ($berita as $p)
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('upload/berita/' . $p->gambar) }}" alt="{{ $p->judul_berita }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->judul_berita }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($p->isi, 100) }}</p>
                            <a href="{{ route('berita.show', $p->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@push('scripts')
@endpush
