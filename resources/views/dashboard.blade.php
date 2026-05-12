<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f5f5;
    font-family:sans-serif;
}

/* HERO */
.hero{
    min-height:85vh;
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
    font-size:55px;
    font-weight:800;
}

.hero h1 span{
    color:#ff6b00;
}

.hero p{
    color:#ddd;
}

.search-box{
    background:white;
    padding:20px;
    border-radius:20px;
    margin-top:30px;
}

.form-control,
.form-select{
    height:52px;
    border-radius:12px;
}

.btn-orange{
    background:#ff6b00;
    color:white;
    border:none;
    height:52px;
    border-radius:12px;
    font-weight:700;
}

.btn-orange:hover{
    background:#e85f00;
    color:white;
}

/* CARD */
.card-field{
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:.2s;
    background:white;
}

.card-field:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,.1);
}

.card-field img{
    width:100%;
    height:230px;
    object-fit:cover;
}

.badge-futsal{
    background:#fff1e7;
    color:#ff6b00;
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:700;
}

.price{
    color:#ff6b00;
    font-weight:800;
}

/* FOOTER */
footer{
    background:#111;
    color:#aaa;
}
</style>

<!-- HERO -->
<div class="hero">

    <div class="container text-center">

        <h1>
            Booking <span>Lapangan Futsal</span><br>
            Jadi Lebih Mudah
        </h1>

        <p>
            Cari venue futsal terbaik dan booking langsung secara online
        </p>

        <div class="search-box">

            <div class="row g-2">

                <div class="col-md-4">
                    <input type="text"
                           class="form-control"
                           placeholder="Cari kota atau venue">
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

<!-- VENUE -->
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Venue Futsal
        </h3>

        <a href="/fields"
           class="text-decoration-none fw-bold"
           style="color:#ff6b00">
            Lihat Semua →
        </a>

    </div>

    <div class="row">

        <!-- CARD 1 -->
        <div class="col-md-4 mb-4">

            <div class="card card-field shadow-sm">

                <img src="https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop">

                <div class="p-3">

                    <span class="badge-futsal">
                        ⚽ Futsal
                    </span>

                    <h5 class="fw-bold mt-3 mb-1">
                        Galaxy Futsal Arena
                    </h5>

                    <p class="text-muted small mb-2">
                        📍 Lampung Selatan
                    </p>

                    <h6 class="price mb-0">
                        Rp 120.000 / jam
                    </h6>

                </div>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="col-md-4 mb-4">

            <div class="card card-field shadow-sm">

                <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?q=80&w=1974&auto=format&fit=crop">

                <div class="p-3">

                    <span class="badge-futsal">
                        ⚽ Futsal
                    </span>

                    <h5 class="fw-bold mt-3 mb-1">
                        Victory Futsal Center
                    </h5>

                    <p class="text-muted small mb-2">
                        📍 Bandar Lampung
                    </p>

                    <h6 class="price mb-0">
                        Rp 150.000 / jam
                    </h6>

                </div>

            </div>

        </div>

        <!-- CARD 3 -->
        <div class="col-md-4 mb-4">

            <div class="card card-field shadow-sm">

                <img src="https://images.unsplash.com/photo-1552667466-07770ae110d0?q=80&w=1974&auto=format&fit=crop">

                <div class="p-3">

                    <span class="badge-futsal">
                        ⚽ Futsal
                    </span>

                    <h5 class="fw-bold mt-3 mb-1">
                        Champion Futsal
                    </h5>

                    <p class="text-muted small mb-2">
                        📍 Kalianda
                    </p>

                    <h6 class="price mb-0">
                        Rp 100.000 / jam
                    </h6>

                </div>

            </div>

        </div>

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
