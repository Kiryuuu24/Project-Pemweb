<x-app-layout>
    <div style="max-width:1200px; margin:0 auto; padding:2rem 1rem;">

        <!-- Header -->
        <div style="margin-bottom:2rem;">
            <h1 style="font-size:2rem; font-weight:800; color:#1f2937;">Pilih Lapangan ⚽</h1>
            <p style="color:#6b7280; margin-top:0.25rem;">Pilih lapangan favoritmu dan booking sekarang!</p>
        </div>

        @if(session('error'))
            <div style="background:#fee2e2; color:#991b1b; padding:0.75rem 1rem; border-radius:0.75rem; margin-bottom:1.5rem;">
                {{ session('error') }}
            </div>
        @endif

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:1.5rem;">
            @forelse($fields as $field)
            <div style="background:white; border-radius:1rem; box-shadow:0 1px 3px rgba(0,0,0,0.1); border:1px solid #f3f4f6; overflow:hidden;">
                @if($field->image)
                    <img src="{{ Storage::url($field->image) }}"
                         style="width:100%; height:200px; object-fit:cover;">
                @else
                    <div style="width:100%; height:200px; background:linear-gradient(135deg,#16a34a,#22c55e); display:flex; align-items:center; justify-content:center; font-size:4rem;">
                        ⚽
                    </div>
                @endif
                <div style="padding:1.25rem;">
                    <h2 style="font-size:1.1rem; font-weight:700; color:#1f2937;">{{ $field->name }}</h2>
                    <p style="color:#6b7280; font-size:0.875rem; margin-top:0.25rem; margin-bottom:0.75rem;">{{ $field->description ?? 'Lapangan futsal berkualitas' }}</p>
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="color:#16a34a; font-weight:700; font-size:1.1rem;">
                            Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}<span style="font-size:0.8rem; color:#9ca3af; font-weight:400;">/jam</span>
                        </span>
                        <a href="/booking/{{ $field->id }}"
                           style="background:#16a34a; color:white; padding:0.5rem 1rem; border-radius:0.5rem; font-size:0.875rem; font-weight:600; text-decoration:none;">
                            Booking →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column:span 3; text-align:center; padding:4rem; color:#9ca3af;">
                <div style="font-size:4rem; margin-bottom:1rem;">🏟️</div>
                <p>Belum ada lapangan tersedia</p>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>