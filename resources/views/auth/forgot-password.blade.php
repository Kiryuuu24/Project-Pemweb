<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password - Futsalin</title>

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

        .forgot-box{
            width:420px;
            background:white;
            padding:40px;
            border-radius:24px;
            box-shadow:0 15px 40px rgba(0,0,0,.3);
        }

        .logo{
            text-align:center;
            margin-bottom:25px;
        }

        .logo h1{
            color:#ff6b00;
            font-size:36px;
            font-weight:800;
        }

        .logo p{
            margin-top:10px;
            color:#666;
            font-size:14px;
            line-height:1.6;
        }

        .status{
            background:#dcfce7;
            color:#166534;
            padding:12px;
            border-radius:12px;
            margin-bottom:20px;
            font-size:14px;
        }

        .input-group{
            margin-bottom:22px;
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

        .error{
            color:red;
            font-size:13px;
            margin-top:5px;
        }

        .submit-btn{
            width:100%;
            height:52px;
            border:none;
            border-radius:14px;
            background:#ff6b00;
            color:white;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
            transition:.2s;
        }

        .submit-btn:hover{
            background:#e65f00;
        }

        .back-login{
            text-align:center;
            margin-top:20px;
        }

        .back-login a{
            text-decoration:none;
            color:#ff6b00;
            font-weight:600;
            font-size:14px;
        }

    </style>
</head>
<body>

    <div class="forgot-box">

        <div class="logo">

            <h1>⚽ Futsalin</h1>

            <p>
                Masukkan email akun Anda dan kami akan mengirimkan link untuk reset password.
            </p>

        </div>

        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">

            @csrf

            <div class="input-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="Masukkan email anda">

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="submit-btn">
                Kirim Link Reset Password
            </button>

        </form>

        <div class="back-login">

            <a href="{{ route('login') }}">
                ← Kembali ke Login
            </a>

        </div>

    </div>

</body>
</html>
