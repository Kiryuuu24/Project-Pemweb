<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-6">Pilih Lapangan</h1>

        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($fields as $field)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                @if($field->image)
                    <img src="{{ Storage::url($field->image) }}" 
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">Tidak ada foto</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $field->name }}</h2>
                    <p class="text-gray-500 text-sm mb-2">{{ $field->description }}</p>
                    <p class="text-blue-600 font-semibold">
                        Rp {{ number_format($field->price_per_hour, 0, ',', '.') }} / jam
                    </p>
                    <a href="{{ route('booking.create', $field) }}"
                       class="mt-3 block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Booking Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>