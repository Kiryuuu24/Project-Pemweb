<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-green-700 to-green-500 rounded-2xl p-8 text-white mb-8 shadow-lg">
            <h1 class="text-3xl font-bold mb-1">Halo, {{ auth()->user()->name }}! 👋</h1>
            <p class="text-green-100 mb-4">Selamat datang di FUTSALIN. Siap main hari ini?</p>
            @if(auth()->user()->role !== 'admin')
            <a href="/fields"
               class="inline-block bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-green-50 transition">
                Booking Sekarang →
            </a>
            @endif
        </div>

        @if(auth()->user()->role === 'admin')
        <!-- Admin Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Lapangan</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Field::count() }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-xl text-3xl">🏟️</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Booking</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Booking::count() }}</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-xl text-3xl">📅</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Menunggu Konfirmasi</p>
                        <p class="text-3xl font-bold text-yellow-500 mt-1">{{ \App\Models\Booking::where('status', 'pending')->count() }}</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-xl text-3xl">⏳</div>
                </div>
            </div>
        </div>

        <!-- Quick Links Admin -->
        <h2 class="text-lg font-bold text-gray-700 mb-4">Menu Admin</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="/admin/bookings"
               class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-green-400 hover:shadow-md transition group">
                <div class="text-3xl mb-3">📋</div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-green-700">Kelola Booking</h3>
                <p class="text-gray-500 text-sm mt-1">Konfirmasi atau tolak pembayaran user</p>
            </a>
            <a href="/admin/fields"
               class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-green-400 hover:shadow-md transition group">
                <div class="text-3xl mb-3">🏟️</div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-green-700">Kelola Lapangan</h3>
                <p class="text-gray-500 text-sm mt-1">Tambah, edit, atau hapus lapangan</p>
            </a>
        </div>

        @else
        <!-- User Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Booking</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Booking::where('user_id', auth()->id())->count() }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-xl text-3xl">📅</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Booking Dikonfirmasi</p>
                        <p class="text-3xl font-bold text-green-600 mt-1">{{ \App\Models\Booking::where('user_id', auth()->id())->where('status', 'confirmed')->count() }}</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-xl text-3xl">✅</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Menunggu Konfirmasi</p>
                        <p class="text-3xl font-bold text-yellow-500 mt-1">{{ \App\Models\Booking::where('user_id', auth()->id())->where('status', 'pending')->count() }}</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-xl text-3xl">⏳</div>
                </div>
            </div>
        </div>

        <!-- Quick Links User -->
        <h2 class="text-lg font-bold text-gray-700 mb-4">Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="/fields"
               class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-green-400 hover:shadow-md transition group">
                <div class="text-3xl mb-3">⚽</div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-green-700">Booking Lapangan</h3>
                <p class="text-gray-500 text-sm mt-1">Lihat dan pesan lapangan tersedia</p>
            </a>
            <a href="/booking/history"
               class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-green-400 hover:shadow-md transition group">
                <div class="text-3xl mb-3">📋</div>
                <h3 class="font-bold text-gray-800 text-lg group-hover:text-green-700">Riwayat Booking</h3>
                <p class="text-gray-500 text-sm mt-1">Lihat semua riwayat booking kamu</p>
            </a>
        </div>
        @endif

    </div>
</x-app-layout>