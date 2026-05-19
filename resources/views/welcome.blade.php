<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutsalKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            margin:0;
            font-family:sans-serif;
            background:#f5f5f5;
        }
        .hero{
            min-height:100vh;
            background:
            linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),
            url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            display:flex;
            align-items:center;
            position:relative;
        }
        .navbar{
            position:absolute;
            width:100%;
            top:0;
            left:0;
            z-index:10;
        }
        .hero h1{
            color:white;
            font-size:60px;
            font-weight:800;
        }
        .hero span{
            color:#ff6b00;
        }
        .hero p{
            color:#ddd;
            font-size:18px;
        }
        .btn-orange{
            background:#ff6b00;
            color:white;
            padding:12px 28px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
        }
        .btn-orange:hover{
            background:#e85f00;
            color:white;
        }

        /* tambahan kecil: scroll hint */
        .scroll-hint{
            position:absolute;
            bottom:28px;
            left:50%;
            transform:translateX(-50%);
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:6px;
            color:rgba(255,255,255,.45);
            font-size:11px;
            letter-spacing:2px;
            text-transform:uppercase;
        }
        .scroll-hint .arr{
            width:16px;
            height:16px;
            border-right:2px solid #ff6b00;
            border-bottom:2px solid #ff6b00;
            transform:rotate(45deg);
            animation:bounce 1.3s infinite;
        }
        @keyframes bounce{
            0%,100%{transform:rotate(45deg) translateY(0)}
            50%    {transform:rotate(45deg) translateY(5px)}
        }

        /* section lapangan */
        .section-lapangan{
            padding:60px 0 80px;
        }
        .section-lapangan h2{
            font-size:32px;
            font-weight:800;
            color:#111;
        }
        .section-lapangan .label{
            font-size:12px;
            font-weight:700;
            letter-spacing:3px;
            text-transform:uppercase;
            color:#ff6b00;
            margin-bottom:4px;
        }
        .section-lapangan .sub{
            color:#888;
            font-size:15px;
            margin-bottom:32px;
        }
        .field-card{
            background:#fff;
            border-radius:14px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,.07);
            transition:transform .22s, box-shadow .22s;
            display:block;
            text-decoration:none;
            color:inherit;
        }
        .field-card:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 28px rgba(255,107,0,.15);
            color:inherit;
            text-decoration:none;
        }
        .field-img{
            height:170px;
            background:#eee;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:42px;
        }
        .field-body{
            padding:16px;
        }
        .field-tag{
            font-size:11px;
            font-weight:700;
            letter-spacing:1px;
            text-transform:uppercase;
            color:#ff6b00;
            background:rgba(255,107,0,.1);
            padding:2px 10px;
            border-radius:100px;
            display:inline-block;
            margin-bottom:8px;
        }
        .field-name{
            font-size:17px;
            font-weight:800;
            color:#111;
            margin-bottom:4px;
        }
        .field-desc{
            font-size:13px;
            color:#888;
            margin-bottom:12px;
            line-height:1.5;
        }
        .field-row{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .field-price{
            font-size:16px;
            font-weight:800;
            color:#111;
        }
        .field-price small{
            font-size:12px;
            font-weight:400;
            color:#aaa;
        }
        .field-avail{
            font-size:12px;
            font-weight:600;
            color:#2d9e57;
            display:flex;
            align-items:center;
            gap:5px;
        }
        .field-avail .dot{
            width:7px;height:7px;
            background:#2d9e57;
            border-radius:50%;
        }
        .btn-book{
            display:block;
            margin-top:12px;
            text-align:center;
            border:1.5px solid #ff6b00;
            color:#ff6b00;
            border-radius:10px;
            padding:8px;
            font-weight:700;
            font-size:14px;
            text-decoration:none;
            transition:background .2s,color .2s;
        }
        .btn-book:hover{background:#ff6b00;color:#fff;}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand text-white fw-bold fs-3" href="/">
            ⚽ Futsalin
        </a>
        <div class="ms-auto">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-warning fw-bold">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-warning fw-bold">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<div class="hero">
    <div class="container text-center">
        <h1>
            Booking <span>Lapangan Futsal</span>
        </h1>
        <p class="mt-3">
            Booking venue futsal jadi lebih cepat dan modern
        </p>
        <div class="mt-4">
            @guest
                <a href="{{ route('login') }}" class="btn-orange">
                    Booking Sekarang
                </a>
            @endguest
        </div>
    </div>

    {{-- scroll hint --}}
    <div class="scroll-hint">
        <span>scroll</span>
        <div class="arr"></div>
    </div>
</div>

{{-- ── SECTION LAPANGAN ── --}}
<section class="section-lapangan">
    <div class="container">
        <div class="label">Pilih Lapangan</div>
        <h2>Lapangan Tersedia</h2>
        <p class="sub">Tersedia setiap hari dengan fasilitas lengkap.</p>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <a href="{{ url('/lapangan/1') }}" class="field-card">
                    <div class="field-img">🏟️</div>
                    <div class="field-body">
                        <span class="field-tag">Indoor</span>
                        <div class="field-name">Lapangan A — Premier</div>
                        <div class="field-desc">Rumput sintetis premium, AC, pencahayaan LED.</div>
                        <div class="field-row">
                            <div class="field-price">Rp 120.000 <small>/ jam</small></div>
                            <div class="field-avail"><span class="dot"></span> Tersedia</div>
                        </div>
                        <span class="btn-book">Booking Sekarang</span>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4">
                <a href="{{ url('/lapangan/2') }}" class="field-card">
                    <div class="field-img">⚽</div>
                    <div class="field-body">
                        <span class="field-tag">Indoor</span>
                        <div class="field-name">Lapangan B — Standard</div>
                        <div class="field-desc">Lantai vynil anti-slip, cocok untuk latihan harian.</div>
                        <div class="field-row">
                            <div class="field-price">Rp 90.000 <small>/ jam</small></div>
                            <div class="field-avail"><span class="dot"></span> Tersedia</div>
                        </div>
                        <span class="btn-book">Booking Sekarang</span>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4">
                <a href="{{ url('/lapangan/3') }}" class="field-card">
                    <div class="field-img">🌙</div>
                    <div class="field-body">
                        <span class="field-tag">Outdoor</span>
                        <div class="field-name">Lapangan C — Night</div>
                        <div class="field-desc">Lampu sorot high-power, open air, ada tribun.</div>
                        <div class="field-row">
                            <div class="field-price">Rp 75.000 <small>/ jam</small></div>
                            <div class="field-avail"><span class="dot"></span> Tersedia</div>
                        </div>
                        <span class="btn-book">Booking Sekarang</span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>