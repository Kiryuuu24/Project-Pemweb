<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#f5f5f5;font-family:sans-serif}

.hero{
    min-height:80vh;
    background:
    linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),
    url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop');
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
}

.hero h1{
    color:white;
    font-size:50px;
    font-weight:800;
}

.hero span{color:#ff6b00}
.hero p{color:#ddd}

.search-box{
    background:white;
    padding:20px;
    border-radius:18px;
    margin-top:25px;
}

.form-control,.form-select{
    height:50px;
    border-radius:12px;
}

.btn-orange{
    background:#ff6b00;
    color:white;
    border:none;
    height:50px;
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
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.card-field img{
    height:230px;
    object-fit:cover;
}

.price{
    color:#ff6b00;
    font-weight:800;
}

footer{
    background:#111;
    color:#aaa;
}

.footer-link{
    color:#aaa;
    text-decoration:none;
    display:block;
    margin-bottom:8px;
}

.footer-link:hover{
    color:white;
}
</style>

<div class="hero">

    <div class="container text-center">

        <h1>
            Booking <span>Lapangan Futsal</span>
        </h1>

        <p>
            Booking venue futsal jadi lebih cepat dan mudah
        </p>

        <div class="search-box">

            <div class="row g-2">

                <div class="col-md-4">
                    <input type="text"
                           class="form-control"
                           placeholder="Cari venue">
                </div>

                <div class="col-md-3">
                    <select class="form-select">
                        <option>⚽ Futsal</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="date"
                           class="form-control"
                           value="{{ date('Y-m-d') }}">
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

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">

        <h3 class="fw-bold">
            Venue Futsal
        </h3>

        <a href="{{ route('fields.index') }}"
           class="text-decoration-none fw-bold"
           style="color:#ff6b00">
            Lihat Semua →
        </a>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">

            <a href="{{ route('fields.index') }}"
               class="text-decoration-none text-dark">

                <div class="card card-field shadow-sm">

                    <img class="w-100"
                         src="https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop">

                    <div class="p-3">

                        <h5 class="fw-bold">
                            Galaxy Futsal Arena
                        </h5>

                        <p class="text-muted small">
                            📍 Lampung Selatan
                        </p>

                        <p class="price mb-0">
                            Rp 120.000 / jam
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-md-6 mb-4">

            <a href="{{ route('fields.index') }}"
               class="text-decoration-none text-dark">

                <div class="card card-field shadow-sm">

                    <img class="w-100"
                         src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?q=80&w=1974&auto=format&fit=crop">

                    <div class="p-3">

                        <h5 class="fw-bold">
                            Victory Futsal Center
                        </h5>

                        <p class="text-muted small">
                            📍 Bandar Lampung
                        </p>

                        <p class="price mb-0">
                            Rp 150.000 / jam
                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

<footer class="pt-5 pb-4">

    <div class="container">

        <div class="row">

            <div class="col-md-4 mb-4">

                <h4 class="text-white fw-bold">
                    ⚽ FutsalKu
                </h4>

                <p class="mt-3">
                    Platform booking lapangan futsal online untuk cari venue,
                    cek jadwal dan booking dengan mudah.
                </p>

            </div>

            <div class="col-md-2 mb-4">

                <h6 class="text-white fw-bold mb-3">
                    Produk
                </h6>

                <a href="{{ route('fields.index') }}" class="footer-link">
                    Venue
                </a>

                <a href="{{ route('booking.history') }}" class="footer-link">
                    Booking
                </a>

                <a href="#" class="footer-link">
                    Jadwal
                </a>

            </div>

            <div class="col-md-3 mb-4">

                <h6 class="text-white fw-bold mb-3">
                    Bantuan
                </h6>

                <a href="#" class="footer-link">
                    Pusat Bantuan
                </a>

                <a href="#" class="footer-link">
                    Kontak Kami
                </a>

                <a href="#" class="footer-link">
                    Syarat & Ketentuan
                </a>

            </div>

            <div class="col-md-3 mb-4">

                <h6 class="text-white fw-bold mb-3">
                    Ikuti Kami
                </h6>

                <a href="#" class="footer-link">
                    Instagram
                </a>

                <a href="#" class="footer-link">
                    TikTok
                </a>

                <a href="#" class="footer-link">
                    YouTube
                </a>

            </div>

        </div>

        <hr style="border-color:#333;">

        <div class="text-center">
            © 2026 FutsalKu. All rights reserved.
        </div>

    </div>

</footer>

</x-app-layout>
