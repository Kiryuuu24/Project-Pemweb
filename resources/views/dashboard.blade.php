<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#f7f7f7;font-family:sans-serif}
.hero{
    background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),
    url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop');
    background-size:cover;
    background-position:center;
    min-height:80vh;
    display:flex;
    align-items:center;
}
.hero h1{font-size:55px;font-weight:800;color:#fff}
.hero span{color:#ff6b00}
.hero p{color:#ddd}
.search-box{
    background:#fff;
    padding:20px;
    border-radius:18px;
    margin-top:30px;
}
.form-control,.form-select{
    height:52px;
    border-radius:12px;
}
.btn-orange{
    background:#ff6b00;
    color:#fff;
    border:none;
    height:52px;
    border-radius:12px;
    font-weight:700;
}
.card-field{
    border:none;
    border-radius:18px;
    overflow:hidden;
    transition:.2s;
}
.card-field:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 30px rgba(0,0,0,.1);
}
.card-field img{
    width:100%;
    height:220px;
    object-fit:cover;
}
.badge-futsal{
    background:#fff1e7;
    color:#ff6b00;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:700;
}
.price{color:#ff6b00;font-weight:800}
footer{background:#111;color:#aaa}
</style>

<!-- HERO -->
<div class="hero">
    <div class="container text-center">

        <h1>
            Booking <span>Lapangan Futsal</span><br>
            Lebih Mudah
        </h1>

        <p>Cari dan booking lapangan futsal favoritmu sekarang</p>

        <div class="search-box">
            <div class="row g-2">

                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Cari kota / venue">
                </div>

                <div class="col-md-3">
                    <select class="form-select">
                        <option>⚽ Futsal</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-orange w-100">
                        Cari
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- VENUE -->
<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">
        <h3 class="fw-bold">
            Venue Futsal
        </h3>

        <a href="/fields" class="text-decoration-none fw-bold text-warning">
            Lihat Semua
        </a>
    </div>

    <div class="row">

        @forelse(\App\Models\Field::all() as $f)

        <div class="col-md-4 mb-4">

            <div class="card card-field">

                <img src="{{ $f->gambar ?? 'https://images.unsplash.com/photo-1575361204480-aadea25e6e68?q=80&w=1974&auto=format&fit=crop' }}">

                <div class="p-3">

                    <span class="badge-futsal">
                        ⚽ Futsal
                    </span>

                    <h5 class="fw-bold mt-3">
                        {{ $f->name ?? $f->nama_lapangan }}
                    </h5>

                    <p class="text-muted mb-2">
                        📍 Lampung Selatan
                    </p>

                    <p class="price mb-0">
                        Rp {{ number_format($f->price_per_hour ?? $f->harga_per_jam) }}/jam
                    </p>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center">
            <p class="text-muted">Belum ada lapangan tersedia.</p>
        </div>

        @endforelse

    </div>

</div>

<!-- FOOTER -->
<footer class="py-4">

    <div class="container text-center">

        <h5 class="text-white fw-bold">
            ⚽ FutsalKu
        </h5>

        <p>
            Platform booking lapangan futsal modern dan praktis.
        </p>

        <small>
            © 2026 FutsalKu
        </small>

    </div>

</footer>

</x-app-layout>
