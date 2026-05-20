@extends('layouts.app')

@section('hero')
<!-- Hero Section -->
<div class="hero-section h-[60vh] flex items-center justify-center text-center px-4 relative">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-white">
        <h1 class="text-4xl md:text-5xl font-serif mb-2 font-bold text-white shadow-sm" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.9);">
            BUDIDAYA TANAMAN PERKEBUNAN
        </h1>
        <p class="text-xl md:text-2xl font-sans" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.9);">
            POLITEKNIK PERTANIAN NEGERI SAMARINDA
        </p>
    </div>
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fa fa-chevron-down text-2xl"></i>
    </div>
</div>
@endsection

@section('content')

<!-- Article 1 -->
<article class="border-b border-btp-border pb-8">
    <h2 class="text-2xl font-serif mb-3">
        <a href="#" class="text-btp-heading hover:text-btp-red transition-colors">PELATIHAN PERAKITAN DAN PENGAPLIKASIKAN ALAT PENYIRAMAN OTOMATIS</a>
    </h2>
    <div class="text-sm text-btp-text mb-4 flex items-center space-x-4">
        <span><i class="fa fa-calendar text-btp-red mr-1"></i> Desember 18, 2021</span>
        <span><i class="fa fa-user text-btp-red mr-1"></i> by Admin</span>
        <span><i class="fa fa-folder-open-o text-btp-red mr-1"></i> Uncategorized</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="overflow-hidden">
            <img src="https://btp.politanisamarinda.ac.id/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-15-at-9.49.53-AM-720x445.jpeg" alt="Pelatihan" class="w-full h-auto hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <p class="text-btp-text leading-relaxed">
                Pembibitan Kelapa Sawit, Laboratorium Kebun Percontohan Budidaya Tanaman Perkebunan Politeknik Pertanian Negeri Samarinda, Tanggal 15-17 Desember 2021
            </p>
        </div>
    </div>
</article>

<!-- Article 2 -->
<article class="border-b border-btp-border pb-8">
    <h2 class="text-2xl font-serif mb-3">
        <a href="#" class="text-btp-heading hover:text-btp-red transition-colors">PENGABDIAN PADA MASYARAKAT PENYULUHAN PEMELIHARAAN KEBERSIHAN LINGKUNGAN</a>
    </h2>
    <div class="text-sm text-btp-text mb-4 flex items-center space-x-4">
        <span><i class="fa fa-calendar text-btp-red mr-1"></i> Desember 11, 2021</span>
        <span><i class="fa fa-user text-btp-red mr-1"></i> by Admin</span>
        <span><i class="fa fa-folder-open-o text-btp-red mr-1"></i> Uncategorized</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="overflow-hidden">
            <img src="https://btp.politanisamarinda.ac.id/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-20.43.56-720x445.jpeg" alt="Pengabdian" class="w-full h-auto hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <p class="text-btp-text leading-relaxed">
                Pada tanggal 10 Desember 2021 Program Studi Budidaya Tanaman Perkebunan Politeknik Pertanian Negeri Samarinda Melakukan Pengabdian pada Masyarakat "Penyuluhan Pemeliharaan Kebersihan Lingkungan Wisata Gunung Lonceng Samarinda"
            </p>
        </div>
    </div>
</article>

@endsection
