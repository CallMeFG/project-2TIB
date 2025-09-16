<x-app-layout> {{-- Menggunakan layout utama dari Breeze --}}
    {{-- BARU: Definisikan judul untuk halaman ini --}}
    <x-slot name="title">
        Rooms
    </x-slot>

    <x-page-header
        title="Kamar"
        :backgroundImageUrl="asset('images/hotel-picture.jpg')" />

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(isset($rooms) && $rooms->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($rooms as $room)
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-md p-4 flex flex-col justify-between">
                            <div>
                                {{-- Menggunakan URL absolut dari seeder untuk gambar --}}
                                <img src="{{ $room->image_url }}" alt="{{ $room->type }}" class="w-full h-48 object-cover rounded-md mb-4">
                                <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100">{{ $room->type }}</h4>
                                <p class="text-sm text-indigo-600 dark:text-indigo-400 font-semibold">
                                    Rp {{ number_format($room->price, 0, ',', '.') }} / malam
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1 mb-3">
                                    {{ Str::limit($room->description, 70) }}
                                </p>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('rooms.show', $room->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition ease-in-out duration-150 w-full justify-center">
                                    Lihat Detail
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Jika Anda menggunakan pagination nanti, link pagination bisa ditaruh di sini --}}
                    {{-- Misalnya: <div class="mt-6">{{ $rooms->links() }}
                </div> --}}

                @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada kamar yang tersedia saat ini.</p>
                @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>