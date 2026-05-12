<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
* { font-family: 'Plus Jakarta Sans', sans-serif; }
.hero-section { background: #1c1c1c; padding: 60px 0; }
.hero-section h1 { color: white; font-size: 2.2rem; font-weight: 700; }
.hero-section h1 span { color: #ff5722; }
.search-box { background: white; border-radius: 12px; padding: 20px; margin-top: 30px; }
.search-box input, .search-box select { border: 1px solid #ddd; border-radius: 8px; height: 48px; font-size: 14px; }
.btn-cek { background: #ff5722; color: white; height: 48px; font-weight: 700; border-radius: 8px; border: none; }
.btn-cek:hover { background: #e64a19; color: white; }
.card-venue { border: none; border-radius: 12px; overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; cursor: pointer; }
.card-venue:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important; }
.card-venue img { height: 180px; object-fit: cover; width: 100%; }
.card-venue .price { color: #ff5722; font-weight: 700; }
.badge-olahraga { background: #fff3e0; color: #ff5722; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
.section-title span { color: #ff5722; }
.olahraga-card { border-radius: 12px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.2s; border: 2px solid transparent; }
.olahraga-card:hover { border-color: #ff5722; transform: translateY(-3px); }
.olahraga-icon { font-size: 2.5rem; }
.navbar { border-bottom: 1px solid #eee; }
</style>

<!-- HERO -->
<div class="hero-section">
    <div class="container">
        <h1 class="text-center">
            Booking <span>Lapangan</span> Futsal terbaik di <span>FutsalKu</span>
        </h1>
        <p class="text-center text-secondary mt-2">Temukan dan booking lapangan favoritmu dengan mudah</p>

        <div class="search-box">
            <div class="row g-2 align-items-center">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="🏙️ Pilih atau cari kota">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>⚽ Pilih olahraga</option>
                        <option>Futsal</option>
                        <option>Badminton</option>
                        <option>Basketball</option>
                        <option>Tennis</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-cek w-100 text-uppercase">Cek Jadwal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- REKOMENDASI VENUE -->
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold section-title mb-0">Rekomendasi <span>Venue</span></h5>
        <a href="/fields" class="text-decoration-none text-muted fw-semibold">Selengkapnya →</a>
    </div>
    <div class="row">
        @forelse(\App\Models\Field::all() as $f)
        <div class="col-md-3 mb-4">
            <div class="card card-venue shadow-sm">
                <img src="{{ $f->gambar ?? 'https://jasakontraktorlapangan.id/wp-content/uploads/2023/05/Analisa-Bisnis-Lapangan-Futsal.jpg' }}" alt="{{ $f->name }}">
                <div class="p-3">
                    <span class="badge-olahraga">Futsal</span>
                    <h6 class="fw-bold mt-2 mb-1">{{ $f->name ?? $f->nama_lapangan }}</h6>
                    <p class="text-muted small mb-1">📍 Lampung • 1 Lapangan</p>
                    <p class="price mt-2 mb-0">
                        Harga mulai Rp {{ number_format($f->price_per_hour ?? $f->harga_per_jam) }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <p>Belum ada lapangan tersedia.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- PILIH OLAHRAGA -->
<div style="background:#f9f9f9;" class="py-5">
    <div class="container">
        <h5 class="fw-bold section-title mb-4">Pilih <span>Olahraga</span></h5>
        <div class="row">
            @foreach([['⚽','Futsal','#fff3e0'],['🏸','Badminton','#e8f5e9'],['🏀','Basketball','#e3f2fd'],['🎾','Tennis','#fce4ec'],['🏐','Voli','#f3e5f5'],['🥊','Boxing','#fff8e1'],['🏊','Renang','#e0f7fa'],['🏋️','Gym','#f1f8e9']] as $s)
            <div class="col-6 col-md-3 mb-3">
                <div class="card olahraga-card shadow-sm" style="background:{{ $s[2] }}">
                    <div class="olahraga-icon">{{ $s[0] }}</div>
                    <p class="fw-semibold mt-2 mb-0">{{ $s[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer style="background:#1c1c1c;" class="py-5 text-white mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">⚽ FutsalKu</h5>
                <p class="text-secondary small">Platform booking lapangan futsal terbaik dan termudah di Indonesia.</p>
            </div>
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold">Produk</h6>
                <ul class="list-unstyled text-secondary small">
                    <li><a href="/fields" class="text-secondary text-decoration-none">Venue</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Aktivitas</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold">Bantuan</h6>
                <ul class="list-unstyled text-secondary small">
                    <li><a href="#" class="text-secondary text-decoration-none">Pusat Bantuan</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold">Ikuti Kami</h6>
                <p class="text-secondary small">📸 Instagram &nbsp; 🎥 YouTube &nbsp; 💼 LinkedIn</p>
            </div>
        </div>
        <hr style="border-color:#333;">
        <p class="text-center text-secondary small mb-0">© 2026 FutsalKu. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>
