<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Booking Lapangan ⚽</h1>
            <p class="text-gray-500 mt-1">{{ $field->name }}</p>
        </div>

        <!-- Info Lapangan -->
        <div class="bg-gradient-to-r from-green-600 to-green-500 rounded-2xl p-5 text-white mb-6">
            <p class="font-bold text-lg">{{ $field->name }}</p>
            <p class="text-green-100 text-sm">{{ $field->description }}</p>
            <p class="text-2xl font-bold mt-2">Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}<span class="text-sm font-normal">/jam</span></p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-xl mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <form action="/booking" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="field_id" value="{{ $field->id }}">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Main</label>
                    <input type="date" name="date" value="{{ old('date') }}"
                           min="{{ date('Y-m-d') }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    @error('date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jam Mulai</label>
                        <input type="time" name="start_time" value="{{ old('start_time') }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        @error('start_time') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jam Selesai</label>
                        <input type="time" name="end_time" value="{{ old('end_time') }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        @error('end_time') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="flex-1 bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition">
                        Booking Sekarang →
                    </button>
                    <a href="/fields"
                       class="px-6 py-3 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>