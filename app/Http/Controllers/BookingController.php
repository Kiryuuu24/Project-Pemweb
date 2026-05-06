<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Halaman daftar lapangan (user)
    public function index()
    {
        $fields = Field::all();
        return view('booking.index', compact('fields'));
    }

    // Form booking lapangan
    public function create(Field $field)
    {
        return view('booking.create', compact('field'));
    }

    // Simpan booking
    public function store(Request $request)
    {
        $request->validate([
            'field_id'   => 'required|exists:fields,id',
            'date'       => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
        ]);

        // Hitung total harga
        $field = Field::find($request->field_id);
        $start = strtotime($request->start_time);
        $end   = strtotime($request->end_time);
        $hours = ($end - $start) / 3600;
        $total = $hours * $field->price_per_hour;

        // Cek apakah jadwal sudah dibooking
        $conflict = Booking::where('field_id', $request->field_id)
            ->where('date', $request->date)
            ->where('status', '!=', 'cancelled')
            ->where(function($q) use ($request) {
                $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                  ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($conflict) {
            return back()->with('error', 'Jadwal sudah dibooking, pilih jam lain!');
        }

        $booking = Booking::create([
            'user_id'     => auth()->id(),
            'field_id'    => $request->field_id,
            'date'        => $request->date,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        return redirect()->route('booking.payment', $booking)
                         ->with('success', 'Booking berhasil! Silakan upload bukti pembayaran.');
    }

    // Riwayat booking user
    public function history()
    {
        $bookings = Booking::where('user_id', auth()->id())
                           ->with('field')
                           ->latest()
                           ->get();
        return view('booking.history', compact('bookings'));
    }
}