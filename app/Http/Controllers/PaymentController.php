<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Halaman upload bukti bayar
    public function show(Booking $booking)
    {
        return view('payment.show', compact('booking'));
    }

    // Simpan bukti bayar
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'proof_image' => 'required|image|max:2048',
        ]);

        $path = $request->file('proof_image')->store('payments', 'public');

        Payment::create([
            'booking_id'  => $booking->id,
            'proof_image' => $path,
            'status'      => 'waiting',
        ]);

        return redirect()->route('booking.history')
                         ->with('success', 'Bukti pembayaran berhasil dikirim! Menunggu konfirmasi admin.');
    }
}