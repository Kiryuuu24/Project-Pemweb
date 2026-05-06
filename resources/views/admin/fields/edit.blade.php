<x-app-layout>
    <div class="max-w-xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Lapangan</h1>

        <form action="..." method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Nama Lapangan</label>
                <input type="text" name="name" value="{{ old('name', $field->name) }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Harga per Jam (Rp)</label>
                <input type="number" name="price_per_hour" value="{{ old('price_per_hour', $field->price_per_hour) }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('description', $field->description) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Foto Lapangan</label>
                <input type="file" name="image" accept="image/*"
                        class="w-full border rounded px-3 py-2">
                     @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                     @if($field->image)
                <img src="{{ Storage::url($field->image) }}" class="w-32 h-32 object-cover rounded mb-2">
                    @endif
</div>
            <div class="flex gap-2">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
                <a href="{{ route('admin.fields.index') }}"
                   class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>