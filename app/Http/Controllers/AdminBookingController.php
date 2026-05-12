<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'field', 'payment'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function confirm(Booking $booking)
    {
        $booking->payment->update([
            'status'      => 'verified',
            'verified_at' => now(),
        ]);

        $booking->update(['status' => 'confirmed']);

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    public function reject(Booking $booking)
    {
        $booking->payment->update(['status' => 'rejected']);
        $booking->update(['status' => 'cancelled']);

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking berhasil ditolak!');
    }
}