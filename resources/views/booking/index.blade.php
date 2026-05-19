<x-app-layout>
    <div style="max-width:1200px; margin:0 auto; padding:2rem 1rem;">
        <h1 style="font-size:2rem; font-weight:800; color:#16a34a; margin-bottom:2rem;">Pilih Lapangan ⚽</h1>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:1.5rem;">
            @forelse($fields as $field)
            <div style="background:white; border-radius:1rem; box-shadow:0 2px 8px rgba(0,0,0,0.1); overflow:hidden;">
                @if($field->image)
                    <img src="{{ Storage::url($field->image) }}" style="width:100%; height:200px; object-fit:cover;">
                @else
                    <div style="width:100%; height:200px; background:linear-gradient(135deg,#16a34a,#22c55e); display:flex; align-items:center; justify-content:center; font-size:4rem;">⚽</div>
                @endif
                <div style="padding:1.25rem;">
                    <h2 style="font-size:1.1rem; font-weight:700; color:#1f2937; margin-bottom:0.5rem;">{{ $field->name }}</h2>
                    <p style="color:#6b7280; font-size:0.875rem; margin-bottom:1rem;">{{ $field->description ?? 'Lapangan futsal berkualitas' }}</p>
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="color:#16a34a; font-weight:700;">Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}/jam</span>
                        <a href="/booking/{{ $field->id }}" style="background:#16a34a; color:white; padding:0.5rem 1rem; border-radius:0.5rem; font-weight:600; text-decoration:none;">Booking →</a>
                    </div>
                </div>
            </div>
            @empty
            <p style="color:#9ca3af;">Belum ada lapangan tersedia</p>
            @endforelse
        </div>
    </div>
</x-app-layout>