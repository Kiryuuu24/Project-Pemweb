@extends('layout')

@section('content')

<!-- HERO -->
<div style="
    background-image:url('https://jasakontraktorlapangan.id/wp-content/uploads/2023/05/Analisa-Bisnis-Lapangan-Futsal.jpg');
    height:350px;
    background-size:cover;
    background-position:center;
    position:relative;
">

    <div style="
        position:absolute;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.6);
    "></div>

    <div class="d-flex align-items-center justify-content-center h-100 text-white position-relative">
        <div class="text-center">
            <h1 class="fw-bold">Cari & Booking Lapangan</h1>
            <p>Main futsal jadi lebih mudah 🔥</p>

            <a href="/fields" class="btn btn-success mt-3 px-4">
                Booking Sekarang
            </a>
        </div>
    </div>

</div>

<!-- SEARCH -->
<div class="container mt-4">
    <div class="card shadow-sm p-3">

        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari lapangan...">
            </div>

            <div class="col-md-4">
                <select class="form-control">
                    <option>Semua Harga</option>
                    <option>< 100k</option>
                    <option>100k - 200k</option>
                    <option>> 200k</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-success w-100">
                    Cari
                </button>
            </div>

        </div>

    </div>
</div>

<!-- LIST LAPANGAN -->
<div class="container py-5">

    <h4 class="fw-bold mb-4">Lapangan Populer</h4>

    <div class="row">

        @foreach(\App\Models\Field::all() as $f)
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm"
                 style="border-radius:15px; overflow:hidden;">

                <!-- GAMBAR -->
                <img src="{{ $f->gambar ?? 'https://jasakontraktorlapangan.id/wp-content/uploads/2023/05/Analisa-Bisnis-Lapangan-Futsal.jpg' }}"
                     style="height:200px; object-fit:cover;">

                <!-- BODY -->
                <div class="p-3">

                    <h5 class="fw-bold">{{ $f->nama_lapangan }}</h5>

                    <p class="text-muted small">
                        {{ $f->deskripsi }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">

                        <span class="text-success fw-bold">
                            Rp {{ number_format($f->harga_per_jam) }}
                        </span>

                        <span class="badge bg-success">Available</span>

                    </div>
                    <a href="/booking?field={{ $f->id_fields }}"
                       class="btn btn-success w-100 mt-3">
                        Booking
                    </a>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection
