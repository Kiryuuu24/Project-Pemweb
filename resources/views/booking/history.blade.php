<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Riwayat Booking 📋</h1>
            <p class="text-gray-500 mt-1">Semua riwayat booking kamu ada di sini</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-green-600 to-green-500 text-white">
                        <th class="p-4 text-left font-semibold">Lapangan</th>
                        <th class="p-4 text-left font-semibold">Tanggal</th>
                        <th class="p-4 text-left font-semibold">Jam</th>
                        <th class="p-4 text-left font-semibold">Total</th>
                        <th class="p-4 text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr class="border-t border-gray-50 hover:bg-gray-50 transition">
                        <td class="p-4 font-medium text-gray-800">{{ $booking->field->name }}</td>
                        <td class="p-4 text-gray-600">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</td>
                        <td class="p-4 text-gray-600">{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                        <td class="p-4 font-semibold text-green-600">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td class="p-4">
                            @if($booking->status == 'confirmed')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">✅ Dikonfirmasi</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">❌ Dibatalkan</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">⏳ Menunggu</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-gray-400">
                            <div class="text-5xl mb-3">📭</div>
                            <p>Belum ada riwayat booking</p>
                            <a href="/fields" class="mt-3 inline-block text-green-600 hover:underline font-medium">Booking sekarang →</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>