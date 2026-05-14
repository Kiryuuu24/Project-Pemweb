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
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
    <div class="container">

        <a class="navbar-brand text-white fw-bold fs-3" href="/">
            ⚽ FutsalKu
        </a>

        <div class="ms-auto">

            @auth

                <a href="{{ route('dashboard') }}"
                   class="btn btn-warning fw-bold">
                    Dashboard
                </a>

            @else

                <a href="{{ route('login') }}"
                   class="btn btn-outline-light me-2">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-warning fw-bold">
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

</div>

</body>
</html>
