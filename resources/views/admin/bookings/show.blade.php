<x-app-layout>
    <div class="max-w-xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-4">Detail Booking</h1>

        <div class="bg-gray-50 rounded-lg p-4 mb-6 space-y-1">
            <p><span class="font-medium">User:</span> {{ $booking->user->name }}</p>
            <p><span class="font-medium">Lapangan:</span> {{ $booking->field->name }}</p>
            <p><span class="font-medium">Tanggal:</span> {{ $booking->date }}</p>
            <p><span class="font-medium">Jam:</span> {{ $booking->start_time }} - {{ $booking->end_time }}</p>
            <p><span class="font-medium">Total:</span> Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
            <p><span class="font-medium">Status:</span> {{ ucfirst($booking->status) }}</p>
        </div>

        @if($booking->payment)
            <div class="mb-6">
                <p class="font-medium mb-2">Bukti Pembayaran:</p>
                <img src="{{ Storage::url($booking->payment->proof_image) }}"
                     class="w-full max-w-sm rounded shadow">
                <p class="mt-2 text-sm">
                    Status: 
                    <span class="font-medium
                        @if($booking->payment->status == 'verified') text-green-600
                        @elseif($booking->payment->status == 'rejected') text-red-600
                        @else text-yellow-600 @endif">
                        {{ ucfirst($booking->payment->status) }}
                    </span>
                </p>
            </div>

            @if($booking->payment->status == 'waiting')
            <div class="flex gap-3">
                <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST">
                    @csrf
                    <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Konfirmasi
                    </button>
                </form>
                <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST">
                    @csrf
                    <button class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600"
                            onclick="return confirm('Yakin tolak booking ini?')">
                        Tolak
                    </button>
                </form>
            </div>
            @endif
        @else
            <p class="text-gray-400">Belum ada bukti pembayaran.</p>
        @endif

        <a href="{{ route('admin.bookings.index') }}"
           class="mt-4 inline-block text-blue-600 hover:underline">
            ← Kembali
        </a>
    </div>
</x-app-layout>