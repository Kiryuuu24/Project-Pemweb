<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Futsalin</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;

            background:
            linear-gradient(rgba(0,0,0,.65),rgba(0,0,0,.65)),
            url('https://images.unsplash.com/photo-1522778119026-d647f0596c20?q=80&w=1974&auto=format&fit=crop');

            background-size:cover;
            background-position:center;
        }

        .login-box{
            width:400px;
            background:white;
            padding:40px;
            border-radius:24px;
            box-shadow:0 15px 40px rgba(0,0,0,.3);
        }

        .logo{
            text-align:center;
            margin-bottom:30px;
        }

        .logo h1{
            color:#ff6b00;
            font-size:38px;
            font-weight:800;
        }

        .logo p{
            color:#666;
            margin-top:8px;
            font-size:14px;
        }

        .input-group{
            margin-bottom:20px;
        }

        .input-group label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
        }

        .input-group input{
            width:100%;
            height:50px;
            border:1px solid #ddd;
            border-radius:14px;
            padding:0 15px;
            font-size:15px;
        }

        .input-group input:focus{
            outline:none;
            border-color:#ff6b00;
            box-shadow:0 0 0 4px rgba(255,107,0,.15);
        }

        .remember{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            font-size:14px;
        }

        .remember a{
            text-decoration:none;
            color:#ff6b00;
            font-weight:600;
        }

        .login-btn{
            width:100%;
            height:52px;
            border:none;
            border-radius:14px;
            background:#ff6b00;
            color:white;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
        }

        .login-btn:hover{
            background:#e65f00;
        }

        .error{
            color:red;
            font-size:13px;
            margin-top:5px;
        }

    </style>
</head>
<body>

    <div class="login-box">

        <div class="logo">
            <h1>⚽ Futsalin</h1>
            <p>Booking lapangan futsal lebih cepat dan mudah</p>
        </div>

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="input-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="Masukkan email">

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="input-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required
                    placeholder="Masukkan password">

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="remember">

                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif

            </div>

            <button type="submit" class="login-btn">
                Login Sekarang
            </button>

        </form>

    </div>

</body>
</html>
