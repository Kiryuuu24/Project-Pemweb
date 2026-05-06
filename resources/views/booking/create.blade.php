<x-app-layout>
    <div class="max-w-xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-2">Booking Lapangan</h1>
        <p class="text-gray-500 mb-6">{{ $field->name }} — Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}/jam</p>

        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="field_id" value="{{ $field->id }}">

            <div>
                <label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" name="date" value="{{ old('date') }}"
                       min="{{ date('Y-m-d') }}"
                       class="w-full border rounded px-3 py-2" required>
                @error('date') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Jam Mulai</label>
                <input type="time" name="start_time" value="{{ old('start_time') }}"
                       class="w-full border rounded px-3 py-2" required>
                @error('start_time') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Jam Selesai</label>
                <input type="time" name="end_time" value="{{ old('end_time') }}"
                       class="w-full border rounded px-3 py-2" required>
                @error('end_time') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Booking
                </button>
                <a href="{{ route('booking.index') }}"
                   class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>