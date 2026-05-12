<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Lapangan</h1>
            <a href="{{ route('admin.fields.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Lapangan
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Harga/Jam</th>
                    <th class="p-3 text-left">Deskripsi</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fields as $field)
                <tr class="border-t">
                    <td class="p-3">{{ $field->name }}</td>
                    <td class="p-3">Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}</td>
                    <td class="p-3">{{ $field->description ?? '-' }}</td>
                    <td class="p-3">
                        @if($field->image)
                    <img src="{{ Storage::url($field->image) }}" class="w-16 h-16 object-cover rounded">
                         @else
                    <span class="text-gray-400">-</span>
                    @endif
                    </td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.fields.edit', $field) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Edit
                        </a>
                        <form action="{{ route('admin.fields.destroy', $field) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus lapangan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
