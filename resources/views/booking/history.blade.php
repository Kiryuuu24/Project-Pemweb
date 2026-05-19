<x-app-layout>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    min-height:100vh;
    background:#0f172a;
}

/* BACKGROUND FULL */
.history-bg{
    min-height:100vh;

    background:
    linear-gradient(rgba(0,0,0,.75),rgba(0,0,0,.75)),
    url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    padding:50px 20px;
}

/* CONTAINER */
.history-wrapper{
    max-width:1200px;
    margin:auto;
}

/* HEADER */
.top-section{
    margin-bottom:35px;
}

.top-section h1{
    color:white;
    font-size:42px;
    font-weight:800;
    margin-bottom:10px;
}

.top-section p{
    color:#d1d5db;
    font-size:16px;
}

/* CARD */
.booking-container{
    background:rgba(255,255,255,.12);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:30px;

    overflow:hidden;

    box-shadow:
    0 20px 50px rgba(0,0,0,.35);
}

/* TOP */
.booking-top{
    padding:28px 35px;

    background:
    linear-gradient(90deg,#16a34a,#22c55e);
}

.booking-top h2{
    color:white;
    font-size:26px;
    font-weight:700;
}

/* TABLE */
.booking-table{
    width:100%;
    border-collapse:collapse;
}

.booking-table thead{
    background:rgba(255,255,255,.08);
}

.booking-table th{
    padding:22px;
    text-align:left;

    color:white;

    font-size:14px;
    font-weight:700;

    border-bottom:
    1px solid rgba(255,255,255,.1);
}

.booking-table td{
    padding:24px 22px;

    color:#f3f4f6;

    border-bottom:
    1px solid rgba(255,255,255,.05);

    font-size:15px;
}

.booking-table tr:hover{
    background:rgba(255,255,255,.05);
}

/* FIELD */
.field-title{
    font-size:16px;
    font-weight:700;
    color:white;
}

/* PRICE */
.price{
    color:#4ade80;
    font-weight:800;
}

/* STATUS */
.badge{
    padding:10px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
    display:inline-block;
}

.badge-success{
    background:#22c55e;
    color:white;
}

.badge-danger{
    background:#ef4444;
    color:white;
}

.badge-warning{
    background:#f59e0b;
    color:white;
}

/* EMPTY */
.empty-booking{
    text-align:center;
    padding:90px 20px;
}

.empty-booking h3{
    font-size:28px;
    color:white;
    margin-bottom:12px;
}

.empty-booking p{
    color:#d1d5db;
    margin-bottom:28px;
}

.empty-booking a{
    display:inline-block;

    padding:15px 30px;

    background:#22c55e;

    color:white;

    border-radius:14px;

    text-decoration:none;

    font-weight:700;

    transition:.2s;
}

.empty-booking a:hover{
    background:#16a34a;
}

/* MOBILE */
@media(max-width:768px){

    .booking-container{
        overflow-x:auto;
    }

    .booking-table{
        min-width:850px;
    }

    .top-section h1{
        font-size:32px;
    }

}

</style>

<div class="history-bg">

    <div class="history-wrapper">

        <div class="top-section">

            <h1>
                Riwayat Booking
            </h1>

            <p>
                Semua aktivitas booking lapangan futsal kamu
            </p>

        </div>

        <div class="booking-container">

            <div class="booking-top">

                <h2>
                    Data Booking
                </h2>

            </div>

            <table class="booking-table">

                <thead>

                    <tr>

                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam Bermain</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($bookings as $booking)

                    <tr>

                        <td>
                            <div class="field-title">
                                {{ $booking->field->name }}
                            </div>
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                        </td>

                        <td>
                            {{ $booking->start_time }}
                            -
                            {{ $booking->end_time }}
                        </td>

                        <td class="price">
                            Rp {{ number_format($booking->total_price,0,',','.') }}
                        </td>

                        <td>

                            @if($booking->status == 'confirmed')

                                <span class="badge badge-success">
                                    Dikonfirmasi
                                </span>

                            @elseif($booking->status == 'cancelled')

                                <span class="badge badge-danger">
                                    Dibatalkan
                                </span>

                            @else

                                <span class="badge badge-warning">
                                    Menunggu
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5">

                            <div class="empty-booking">

                                <h3>
                                    Belum Ada Booking
                                </h3>

                                <p>
                                    Kamu belum melakukan booking lapangan futsal
                                </p>

                                <a href="/fields">
                                    Booking Sekarang
                                </a>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>
