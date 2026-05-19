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
.fields-bg{

    min-height:100vh;

    background:
    linear-gradient(rgba(0,0,0,.75),rgba(0,0,0,.75)),
    url('https://images.unsplash.com/photo-1522778119026-d647f0596c20?q=80&w=1974&auto=format&fit=crop');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    padding:50px 20px;
}

/* CONTAINER */
.fields-wrapper{
    max-width:1250px;
    margin:auto;
}

/* TOP */
.top-section{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:35px;
    flex-wrap:wrap;
    gap:15px;
}

.top-section h1{
    color:white;
    font-size:40px;
    font-weight:800;
}

.add-btn{
    background:#2563eb;
    color:white;
    padding:14px 22px;
    border-radius:14px;
    text-decoration:none;
    font-weight:700;
    transition:.2s;
}

.add-btn:hover{
    background:#1d4ed8;
}

/* ALERT */
.alert-success{
    background:#22c55e;
    color:white;
    padding:15px 20px;
    border-radius:16px;
    margin-bottom:25px;
    font-weight:600;
}

/* TABLE CARD */
.table-card{

    background:rgba(255,255,255,.12);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.1);

    border-radius:30px;

    overflow:hidden;

    box-shadow:
    0 20px 50px rgba(0,0,0,.35);
}

/* TABLE */
.fields-table{
    width:100%;
    border-collapse:collapse;
}

.fields-table thead{
    background:rgba(255,255,255,.08);
}

.fields-table th{
    padding:22px;
    text-align:left;

    color:white;

    font-size:14px;
    font-weight:700;

    border-bottom:
    1px solid rgba(255,255,255,.1);
}

.fields-table td{
    padding:22px;

    color:#f3f4f6;

    border-bottom:
    1px solid rgba(255,255,255,.05);

    vertical-align:middle;
}

.fields-table tr:hover{
    background:rgba(255,255,255,.05);
}

/* IMAGE */
.field-image{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:16px;
}

/* BUTTONS */
.action-group{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.btn{
    padding:10px 16px;
    border-radius:12px;
    text-decoration:none;
    color:white;
    font-size:14px;
    font-weight:700;
    border:none;
    cursor:pointer;
    transition:.2s;
}

.btn-booking{
    background:#22c55e;
}

.btn-booking:hover{
    background:#16a34a;
}

.btn-edit{
    background:#f59e0b;
}

.btn-edit:hover{
    background:#d97706;
}

.btn-delete{
    background:#ef4444;
}

.btn-delete:hover{
    background:#dc2626;
}

/* EMPTY */
.empty-image{
    color:#d1d5db;
}

/* MOBILE */
@media(max-width:768px){

    .table-card{
        overflow-x:auto;
    }

    .fields-table{
        min-width:1000px;
    }

    .top-section h1{
        font-size:32px;
    }

}

</style>

<div class="fields-bg">

    <div class="fields-wrapper">

        <div class="top-section">

            <h1>
                Daftar Lapangan
            </h1>

            @if(Auth::user()->role == 'admin')

                <a href="{{ route('admin.fields.create') }}"
                   class="add-btn">

                    Tambah Lapangan

                </a>

            @endif

        </div>

        @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="table-card">

            <table class="fields-table">

                <thead>

                    <tr>

                        <th>Nama Lapangan</th>
                        <th>Harga / Jam</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>

                        @if(Auth::user()->role == 'admin')
                            <th>Aksi</th>
                        @else
                            <th>Booking</th>
                        @endif

                    </tr>

                </thead>

                <tbody>

                    @foreach($fields as $field)

                    <tr>

                        <td>

                            <strong>
                                {{ $field->name }}
                            </strong>

                        </td>

                        <td>

                            Rp {{ number_format($field->price_per_hour,0,',','.') }}

                        </td>

                        <td>

                            {{ $field->description ?? '-' }}

                        </td>

                        <td>

                            @if($field->image)

                                <img
                                    src="{{ Storage::url($field->image) }}"
                                    class="field-image">

                            @else

                                <span class="empty-image">
                                    Tidak ada foto
                                </span>

                            @endif

                        </td>

                        {{-- USER --}}
                        @if(Auth::user()->role != 'admin')

                        <td>

                            <a href="{{ route('booking.create', $field) }}"
                               class="btn btn-booking">

                                Booking

                            </a>

                        </td>

                        @endif

                        {{-- ADMIN --}}
                        @if(Auth::user()->role == 'admin')

                        <td>

                            <div class="action-group">

                                <a href="{{ route('admin.fields.edit', $field) }}"
                                   class="btn btn-edit">

                                    Edit

                                </a>

                                <form action="{{ route('admin.fields.destroy', $field) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus lapangan ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-delete">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                        @endif

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>
