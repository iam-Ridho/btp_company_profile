@extends('layouts.app')

@section('content')
<!-- Left Column (Primary Content) -->
<div class="flex flex-col gap-8">
    <!-- Vision Section -->
    <article class="border-b border-btp-border pb-8">
        <h2 class="text-2xl font-serif mb-4 text-btp-heading">Visi Program Studi</h2>
        <div class="text-lg text-btp-text leading-relaxed italic border-l-4 border-btp-red pl-4">
            "Menjadi Program Studi yang Unggul dan Mandiri dalam Bidang Budidaya Tanaman Perkebunan yang Berorientasi pada Kebutuhan Industri dan Masyarakat Berkelanjutan di Tingkat Nasional pada Tahun 2026."
        </div>
    </article>

    <!-- Mission Section -->
    <article class="border-b border-btp-border pb-8">
        <h2 class="text-2xl font-serif mb-4 text-btp-heading">Misi Program Studi</h2>
        <div class="space-y-6 text-btp-text">
            <div class="flex gap-4 items-start">
                <span class="bg-btp-red text-white w-8 h-8 flex items-center justify-center rounded-full shrink-0 font-bold">1</span>
                <p class="leading-relaxed">Menyelenggarakan pendidikan vokasi yang berkualitas dan relevan dengan perkembangan industri perkebunan terkini.</p>
            </div>
            <div class="flex gap-4 items-start">
                <span class="bg-btp-red text-white w-8 h-8 flex items-center justify-center rounded-full shrink-0 font-bold">2</span>
                <p class="leading-relaxed">Melaksanakan penelitian terapan yang inovatif guna memecahkan permasalahan teknis dan manajerial di sektor perkebunan.</p>
            </div>
            <div class="flex gap-4 items-start">
                <span class="bg-btp-red text-white w-8 h-8 flex items-center justify-center rounded-full shrink-0 font-bold">3</span>
                <p class="leading-relaxed">Melaksanakan pengabdian kepada masyarakat melalui transfer teknologi dan pendampingan petani perkebunan.</p>
            </div>
            <div class="flex gap-4 items-start">
                <span class="bg-btp-red text-white w-8 h-8 flex items-center justify-center rounded-full shrink-0 font-bold">4</span>
                <p class="leading-relaxed">Menjalin kerjasama yang produktif dengan berbagai pemangku kepentingan untuk meningkatkan daya saing lulusan.</p>
            </div>
        </div>
    </article>

    <!-- Featured Image / Laboratory Context -->
    <div class="rounded overflow-hidden group">
        <img class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQWydf75am9zJNhJKcyo0Pw3g1p2nY8a38BnlgnezkEbin2i5-4iz3RiWXvRl0w0FGtB9Eegz2dT0693gL2D61g1ISA51CIaqvmaeRgfQhmCw4yF_lGW517xLTO2CFVDpA1ZyyNECrMA2Kt9Qvt49JraffIne_xRJfLT2c6xpCIa_Pih3hgqvsc0aAbBsymAFqaSyugYHd0gvdre8JAA2B73ZiVeyVpgTyJ3GTAPrbkXQ9Qzb6I2Znuni8znvy0n1PVXoZ37OudP4">
        <div class="p-4 bg-gray-50 border border-t-0 border-btp-border">
            <p class="text-sm text-gray-500 italic text-center">Fasilitas Laboratorium Terpadu Budidaya Tanaman Perkebunan</p>
        </div>
    </div>
</div>

@endsection
