<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-4">Manajemen Booking</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Lapangan</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Jam</th>
                    <th class="p-3 text-left">Total</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr class="border-t">
                    <td class="p-3">{{ $booking->user->name }}</td>
                    <td class="p-3">{{ $booking->field->name }}</td>
                    <td class="p-3">{{ $booking->date }}</td>
                    <td class="p-3">{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                    <td class="p-3">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-sm
                            @if($booking->status == 'confirmed') bg-green-100 text-green-800
                            @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="p-3">
                        <a href="{{ route('admin.bookings.show', $booking) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-3 text-center text-gray-400">Belum ada booking</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>