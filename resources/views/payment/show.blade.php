<x-app-layout>
    <div class="max-w-xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-2">Upload Bukti Pembayaran</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-50 rounded-lg p-4 mb-6 space-y-1">
            <p><span class="font-medium">Lapangan:</span> {{ $booking->field->name }}</p>
            <p><span class="font-medium">Tanggal:</span> {{ $booking->date }}</p>
            <p><span class="font-medium">Jam:</span> {{ $booking->start_time }} - {{ $booking->end_time }}</p>
            <p><span class="font-medium">Total:</span> 
                <span class="text-blue-600 font-bold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
            </p>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
            <p class="font-medium text-blue-800 mb-2">Transfer ke rekening berikut:</p>
            <p class="text-blue-700">Bank BCA — 1234567890</p>
            <p class="text-blue-700">a.n. Futsal Arena</p>
        </div>

        <form action="{{ route('payment.store', $booking) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Foto Bukti Transfer</label>
                <input type="file" name="proof_image" accept="image/*"
                       class="w-full border rounded px-3 py-2" required>
                @error('proof_image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Kirim Bukti Pembayaran
            </button>
        </form>
    </div>
</x-app-layout>