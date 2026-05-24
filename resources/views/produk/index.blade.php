@extends('layouts.app')

@section('content')
<div class="space-y-8">
    
    <!-- Header Section -->
    <div class="bg-btp-red text-white p-6 rounded-lg shadow-sm mb-8">
        <h1 class="text-3xl font-serif mb-4 text-white">Produk Hasil Praktikum</h1>
        <p class="text-lg leading-relaxed mb-6 font-sans">
            Selamat Datang... Anda Mengunjungi Produk Hasil Praktikum BTP. Jika Anda Membutuhkan Bibit, Sayuran Hidroponik, dan Hasil Kebun Percobaan dengan <strong>KUALITAS YANG BAIK, HARGA EKONOMIS DAN TERPERCAYA !!!</strong>
        </p>
        <a href="#" class="inline-flex items-center bg-white text-btp-red font-semibold py-2 px-6 rounded hover:bg-gray-100 transition duration-300">
            {{-- isi no wa --}}
            <i class="fa fa-shopping-basket mr-2"></i> Mulai Belanja
        </a>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($produks as $produk)
        <div class="bg-white border border-btp-border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col group">
            
            <!-- Image Area -->
            <div class="relative h-48 bg-gray-100 overflow-hidden">
                @if($produk->getFirstMediaUrl('image'))
                    <img src="{{ $produk->getFirstMediaUrl('image') }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                        <i class="fa fa-shopping-bag text-4xl mb-2"></i>
                        <span class="text-sm">No Image</span>
                    </div>
                @endif
            </div>

            <!-- Content Area -->
            <div class="p-5 flex flex-col flex-1">
                <h3 class="text-lg font-serif font-bold text-btp-heading mb-2 line-clamp-2">
                    {{ $produk->nama }}
                </h3>
                <p class="text-btp-red font-bold text-lg mb-4">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>
                
                <div class="mt-auto pt-4 border-t border-btp-border">
                    <a href="#" class="inline-block w-full text-center border border-btp-red text-btp-red px-4 py-2 rounded hover:bg-btp-red hover:text-white transition-colors text-sm font-semibold">
                        {{-- isi no wa --}}
                        <i class="fa fa-whatsapp mr-1"></i> Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($produks->isEmpty())
    <div class="text-center py-12 bg-gray-50 border border-dashed border-gray-300 rounded-lg">
        <p class="text-gray-500 font-medium">Belum ada produk yang tersedia saat ini.</p>
    </div>
    @endif

</div>
@endsection
