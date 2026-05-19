<x-app-layout>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#0f172a;
}

/* BACKGROUND */
.booking-bg{

    min-height:100vh;

    background:
    linear-gradient(rgba(0,0,0,.78),rgba(0,0,0,.78)),
    url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?q=80&w=1974&auto=format&fit=crop');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    padding:50px 20px;
}

/* WRAPPER */
.booking-wrapper{
    max-width:1300px;
    margin:auto;
}

/* HEADER */
.booking-header{
    margin-bottom:35px;
}

.booking-header h1{
    color:white;
    font-size:42px;
    font-weight:800;
    margin-bottom:10px;
}

.booking-header p{
    color:#d1d5db;
    font-size:15px;
}

/* ALERT */
.alert-success{
    background:#22c55e;
    color:white;
    padding:16px 20px;
    border-radius:16px;
    margin-bottom:25px;
    font-weight:600;
}

/* TABLE CARD */
.booking-card{

    background:rgba(255,255,255,.12);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.1);

    border-radius:30px;

    overflow:hidden;

    box-shadow:
    0 20px 50px rgba(0,0,0,.35);
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
    padding:22px;

    color:#f3f4f6;

    border-bottom:
    1px solid rgba(255,255,255,.05);

    vertical-align:middle;
}

.booking-table tr:hover{
    background:rgba(255,255,255,.05);
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

/* PRICE */
.price{
    color:#4ade80;
    font-weight:800;
}

/* BUTTON */
.detail-btn{
    display:inline-block;

    padding:10px 18px;

    background:#3b82f6;

    color:white;

    border-radius:12px;

    text-decoration:none;

    font-size:14px;
    font-weight:700;

    transition:.2s;
}

.detail-btn:hover{
    background:#2563eb;
}

/* EMPTY */
.empty-booking{
    text-align:center;
    padding:90px 20px;
}

.empty-booking h3{
    color:white;
    font-size:28px;
    margin-bottom:12px;
}

.empty-booking p{
    color:#d1d5db;
}

/* MOBILE */
@media(max-width:768px){

    .booking-card{
        overflow-x:auto;
    }

    .booking-table{
        min-width:1100px;
    }

    .booking-header h1{
        font-size:34px;
    }

}

</style>

<div class="booking-bg">

    <div class="booking-wrapper">

        <div class="booking-header">

            <h1>
                Manajemen Booking
            </h1>

            <p>
                Kelola semua data booking lapangan futsal
            </p>

        </div>

        @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="booking-card">

            <table class="booking-table">

                <thead>

                    <tr>

                        <th>User</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam Bermain</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($bookings as $booking)

                    <tr>

                        <td>

                            {{ $booking->user->name }}

                        </td>

                        <td>

                            {{ $booking->field->name }}

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

                                    Confirmed

                                </span>

                            @elseif($booking->status == 'cancelled')

                                <span class="badge badge-danger">

                                    Cancelled

                                </span>

                            @else

                                <span class="badge badge-warning">

                                    Pending

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.bookings.show', $booking) }}"
                               class="detail-btn">

                                Detail

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7">

                            <div class="empty-booking">

                                <h3>
                                    Belum Ada Booking
                                </h3>

                                <p>
                                    Data booking masih kosong
                                </p>

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
