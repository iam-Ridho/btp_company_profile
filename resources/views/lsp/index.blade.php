@extends('layouts.app')

@section('hero')
{{-- Hero Section --}}
<div class="relative overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 40%, #0f3460 70%, #ba4444 100%); min-height: 320px;">
    {{-- Animated background elements --}}
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-[#ba4444] opacity-10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 -left-10 w-64 h-64 bg-blue-500 opacity-10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-48 h-48 bg-[#41b582] opacity-5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    {{-- Grid Pattern Overlay --}}
    <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex items-center min-h-[320px]">
        <div class="w-full">
            {{-- Badge --}}
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-2xl">
                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4 leading-tight">
                        LSP <span style="color: #41b582;">Pertanian</span><br>
                        <span class="text-3xl md:text-4xl text-white/80">Politani Samarinda</span>
                    </h1>
                    <p class="text-white/70 text-lg leading-relaxed">
                        Lembaga Sertifikasi Profesi yang berlisensi dari Badan Nasional Sertifikasi Profesi (BNSP) 
                        untuk menyelenggarakan uji kompetensi di bidang pertanian dan perkebunan.
                    </p>
                </div>

                {{-- Stats --}}
                <div class="flex gap-6 lg:gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white mb-1">500+</div>
                        <div class="text-white/60 text-sm">Peserta Sertifikasi</div>
                    </div>
                    <div class="w-px bg-white/20"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white mb-1">12</div>
                        <div class="text-white/60 text-sm">Skema Kompetensi</div>
                    </div>
                    <div class="w-px bg-white/20"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#41b582] mb-1">BNSP</div>
                        <div class="text-white/60 text-sm">Berlisensi Resmi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="space-y-10">

    {{-- ===== APA ITU LSP ===== --}}
    <article class="border-b border-btp-border pb-10">
        <div class="flex items-center gap-3 mb-5">
            <span class="w-1 h-8 bg-btp-red rounded-full"></span>
            <h2 class="text-2xl font-serif text-btp-heading">Apa itu LSP?</h2>
        </div>
        <div class="bg-gradient-to-br from-gray-50 to-white border border-btp-border rounded-xl p-6 mb-5">
            <p class="text-btp-text leading-relaxed mb-4">
                <strong>Lembaga Sertifikasi Profesi (LSP)</strong> adalah lembaga pelaksana kegiatan sertifikasi kompetensi 
                yang mendapat lisensi dari Badan Nasional Sertifikasi Profesi (BNSP). LSP bertugas melaksanakan 
                sertifikasi kompetensi sesuai ruang lingkup yang diberikan BNSP.
            </p>
            <p class="text-btp-text leading-relaxed">
                LSP Pertanian Politani Samarinda merupakan LSP pihak ketiga (LSP-P3) yang memiliki komitmen untuk 
                meningkatkan kompetensi tenaga kerja di bidang pertanian dan perkebunan di Kalimantan Timur dan sekitarnya.
            </p>
        </div>

        {{-- BNSP License Info --}}
        <div class="flex items-start gap-4 bg-blue-50 border border-blue-200 rounded-xl p-5">
            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fa fa-certificate text-blue-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-semibold text-blue-800 mb-1">Terakreditasi BNSP</h4>
                <p class="text-sm text-blue-700 leading-relaxed">
                    LSP Pertanian Politani Samarinda telah mendapatkan lisensi resmi dari Badan Nasional Sertifikasi 
                    Profesi (BNSP) sebagai lembaga yang berwenang melaksanakan uji kompetensi di bidang pertanian.
                </p>
            </div>
        </div>
    </article>

    {{-- ===== SKEMA SERTIFIKASI ===== --}}
    <article class="border-b border-btp-border pb-10">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-1 h-8 bg-btp-red rounded-full"></span>
            <h2 class="text-2xl font-serif text-btp-heading">Skema Sertifikasi</h2>
        </div>
        <p class="text-btp-text leading-relaxed mb-6">
            LSP Pertanian Politani Samarinda menyediakan berbagai skema sertifikasi kompetensi yang mencakup 
            bidang-bidang utama dalam pertanian dan perkebunan:
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @php
            $skema = [
                ['icon' => 'fa-leaf', 'color' => '#41b582', 'bg' => 'bg-green-50', 'border' => 'border-green-200',
                 'title' => 'Budidaya Tanaman Perkebunan', 'desc' => 'Sertifikasi kompetensi dalam teknik budidaya tanaman perkebunan seperti kelapa sawit, karet, dan kakao.'],
                ['icon' => 'fa-flask', 'color' => '#3b82f6', 'bg' => 'bg-blue-50', 'border' => 'border-blue-200',
                 'title' => 'Pengolahan Hasil Pertanian', 'desc' => 'Sertifikasi dalam pengolahan dan penanganan pascapanen produk pertanian.'],
                ['icon' => 'fa-bug', 'color' => '#f59e0b', 'bg' => 'bg-amber-50', 'border' => 'border-amber-200',
                 'title' => 'Perlindungan Tanaman', 'desc' => 'Kompetensi dalam identifikasi hama-penyakit dan pengelolaan perlindungan tanaman.'],
                ['icon' => 'fa-tint', 'color' => '#06b6d4', 'bg' => 'bg-cyan-50', 'border' => 'border-cyan-200',
                 'title' => 'Pengelolaan Lahan & Air', 'desc' => 'Sertifikasi dalam manajemen lahan pertanian dan sistem irigasi.'],
                ['icon' => 'fa-truck', 'color' => '#8b5cf6', 'bg' => 'bg-purple-50', 'border' => 'border-purple-200',
                 'title' => 'Agribisnis & Pemasaran', 'desc' => 'Kompetensi dalam pemasaran produk pertanian dan manajemen agribisnis.'],
                ['icon' => 'fa-users', 'color' => '#ef4444', 'bg' => 'bg-red-50', 'border' => 'border-red-200',
                 'title' => 'Supervisi Pertanian', 'desc' => 'Sertifikasi untuk tenaga pengawas dan supervisor di sektor perkebunan.'],
            ];
            @endphp

            @foreach($skema as $item)
            <div class="flex items-start gap-4 {{ $item['bg'] }} border {{ $item['border'] }} rounded-xl p-5 hover:shadow-md transition-shadow duration-300 group">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center" style="background-color: {{ $item['color'] }}20;">
                    <i class="fa {{ $item['icon'] }} text-xl" style="color: {{ $item['color'] }};"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-btp-heading mb-1 text-sm">{{ $item['title'] }}</h4>
                    <p class="text-xs text-btp-text leading-relaxed">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </article>

    {{-- ===== ALUR SERTIFIKASI ===== --}}
    <article class="border-b border-btp-border pb-10">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-1 h-8 bg-btp-red rounded-full"></span>
            <h2 class="text-2xl font-serif text-btp-heading">Alur Sertifikasi</h2>
        </div>
        <p class="text-btp-text leading-relaxed mb-8">
            Proses sertifikasi kompetensi dilakukan melalui tahapan yang terstruktur untuk memastikan 
            kualitas dan validitas kompetensi peserta:
        </p>

        <div class="space-y-4">
            @php
            $alur = [
                ['step' => '01', 'title' => 'Pendaftaran', 'desc' => 'Peserta mendaftar melalui sekretariat LSP atau secara online, melengkapi formulir pendaftaran dan dokumen persyaratan.', 'icon' => 'fa-pencil'],
                ['step' => '02', 'title' => 'Verifikasi Dokumen', 'desc' => 'Tim LSP memverifikasi kelengkapan dan keabsahan dokumen yang dikumpulkan oleh calon peserta.', 'icon' => 'fa-check-square-o'],
                ['step' => '03', 'title' => 'Asesmen Mandiri', 'desc' => 'Peserta mengisi formulir asesmen mandiri untuk menilai kemampuan diri sendiri terhadap standar kompetensi yang diuji.', 'icon' => 'fa-clipboard'],
                ['step' => '04', 'title' => 'Uji Kompetensi', 'desc' => 'Peserta mengikuti uji kompetensi yang dilaksanakan oleh asesor kompeten yang ditunjuk oleh LSP.', 'icon' => 'fa-graduation-cap'],
                ['step' => '05', 'title' => 'Keputusan Sertifikasi', 'desc' => 'LSP mengeluarkan keputusan berdasarkan hasil uji kompetensi: Kompeten (K) atau Belum Kompeten (BK).', 'icon' => 'fa-gavel'],
                ['step' => '06', 'title' => 'Penerbitan Sertifikat', 'desc' => 'Peserta yang dinyatakan kompeten akan mendapatkan Sertifikat Kompetensi yang diterbitkan oleh BNSP.', 'icon' => 'fa-certificate'],
            ];
            @endphp

            @foreach($alur as $index => $step)
            <div class="flex items-start gap-5 group">
                {{-- Step Number & Line --}}
                <div class="flex flex-col items-center flex-shrink-0">
                    <div class="w-12 h-12 bg-btp-red text-white rounded-full flex items-center justify-center font-bold text-sm font-serif shadow-lg group-hover:scale-110 transition-transform duration-300">
                        {{ $step['step'] }}
                    </div>
                    @if($index < count($alur) - 1)
                    <div class="w-0.5 h-8 bg-btp-border mt-1"></div>
                    @endif
                </div>
                {{-- Content --}}
                <div class="flex-1 pb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <i class="fa {{ $step['icon'] }} text-btp-red text-sm"></i>
                        <h4 class="font-semibold text-btp-heading">{{ $step['title'] }}</h4>
                    </div>
                    <p class="text-sm text-btp-text leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </article>

    {{-- ===== PERSYARATAN ===== --}}
    <article class="border-b border-btp-border pb-10">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-1 h-8 bg-btp-red rounded-full"></span>
            <h2 class="text-2xl font-serif text-btp-heading">Persyaratan Peserta</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Persyaratan Umum --}}
            <div class="bg-white border border-btp-border rounded-xl p-6 shadow-sm">
                <h3 class="font-serif text-lg text-btp-heading mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-btp-red text-white rounded-lg flex items-center justify-center text-sm">
                        <i class="fa fa-list"></i>
                    </span>
                    Persyaratan Umum
                </h3>
                <ul class="space-y-3">
                    @php
                    $syarat_umum = [
                        'Warga Negara Indonesia (WNI)',
                        'Fotokopi KTP yang masih berlaku',
                        'Pas foto ukuran 3x4 (2 lembar)',
                        'Ijazah terakhir (fotokopi)',
                        'Surat keterangan sehat dari dokter',
                        'Mengisi formulir pendaftaran',
                    ];
                    @endphp
                    @foreach($syarat_umum as $syarat)
                    <li class="flex items-start gap-3 text-sm text-btp-text">
                        <i class="fa fa-check-circle text-btp-green mt-0.5 flex-shrink-0"></i>
                        <span>{{ $syarat }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Persyaratan Khusus --}}
            <div class="bg-white border border-btp-border rounded-xl p-6 shadow-sm">
                <h3 class="font-serif text-lg text-btp-heading mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-btp-green text-white rounded-lg flex items-center justify-center text-sm">
                        <i class="fa fa-star"></i>
                    </span>
                    Persyaratan Khusus
                </h3>
                <ul class="space-y-3">
                    @php
                    $syarat_khusus = [
                        'Memiliki pengalaman kerja minimal 1 tahun di bidang terkait',
                        'Portofolio atau bukti pengalaman kerja',
                        'Sertifikat pelatihan yang relevan (jika ada)',
                        'Rekomendasi dari atasan/pembimbing',
                        'Membayar biaya sertifikasi yang ditetapkan',
                    ];
                    @endphp
                    @foreach($syarat_khusus as $syarat)
                    <li class="flex items-start gap-3 text-sm text-btp-text">
                        <i class="fa fa-check-circle text-btp-green mt-0.5 flex-shrink-0"></i>
                        <span>{{ $syarat }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </article>

    {{-- ===== JADWAL SERTIFIKASI ===== --}}
    <article class="border-b border-btp-border pb-10">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-1 h-8 bg-btp-red rounded-full"></span>
            <h2 class="text-2xl font-serif text-btp-heading">Jadwal Sertifikasi {{ date('Y') }}</h2>
        </div>

        <div class="overflow-hidden rounded-xl border border-btp-border shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-btp-red text-white">
                            <th class="text-left px-5 py-4 font-semibold">No</th>
                            <th class="text-left px-5 py-4 font-semibold">Skema Sertifikasi</th>
                            <th class="text-left px-5 py-4 font-semibold">Periode</th>
                            <th class="text-left px-5 py-4 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $jadwal = [
                            ['no' => 1, 'skema' => 'Budidaya Tanaman Perkebunan', 'periode' => 'Maret – April ' . date('Y'), 'status' => 'Selesai', 'status_color' => 'bg-gray-100 text-gray-600'],
                            ['no' => 2, 'skema' => 'Pengolahan Hasil Pertanian', 'periode' => 'Mei – Juni ' . date('Y'), 'status' => 'Selesai', 'status_color' => 'bg-gray-100 text-gray-600'],
                            ['no' => 3, 'skema' => 'Perlindungan Tanaman', 'periode' => 'Juli – Agustus ' . date('Y'), 'status' => 'Dibuka', 'status_color' => 'bg-green-100 text-green-700'],
                            ['no' => 4, 'skema' => 'Agribisnis & Pemasaran', 'periode' => 'September – Oktober ' . date('Y'), 'status' => 'Akan Datang', 'status_color' => 'bg-blue-100 text-blue-700'],
                            ['no' => 5, 'skema' => 'Supervisi Pertanian', 'periode' => 'November – Desember ' . date('Y'), 'status' => 'Akan Datang', 'status_color' => 'bg-blue-100 text-blue-700'],
                        ];
                        @endphp
                        @foreach($jadwal as $j)
                        <tr class="border-t border-btp-border hover:bg-gray-50 transition-colors {{ $loop->even ? 'bg-gray-50/50' : '' }}">
                            <td class="px-5 py-4 text-btp-text font-medium">{{ $j['no'] }}</td>
                            <td class="px-5 py-4 text-btp-heading font-medium">{{ $j['skema'] }}</td>
                            <td class="px-5 py-4 text-btp-text">{{ $j['periode'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-1.5 {{ $j['status_color'] }} text-xs font-semibold px-3 py-1 rounded-full">
                                    @if($j['status'] === 'Dibuka')
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                    @elseif($j['status'] === 'Akan Datang')
                                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                    @else
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                    @endif
                                    {{ $j['status'] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>

    {{-- ===== KONTAK & PENDAFTARAN ===== --}}
    <article>
        <div class="flex items-center gap-3 mb-6">
            <span class="w-1 h-8 bg-btp-red rounded-full"></span>
            <h2 class="text-2xl font-serif text-btp-heading">Kontak & Pendaftaran</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Contact Info --}}
            <div class="bg-gradient-to-br from-[#1a1a2e] to-[#0f3460] rounded-xl p-6 text-white">
                <h3 class="font-serif text-lg mb-5 text-white">Sekretariat LSP</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa fa-map-marker text-[#41b582]"></i>
                        </div>
                        <div>
                            <div class="text-xs text-white/60 mb-0.5 uppercase tracking-wider">Alamat</div>
                            <p class="text-sm text-white/90">Jl. Samratulangi No.1, Sei Keledang, Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75131</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa fa-phone text-[#41b582]"></i>
                        </div>
                        <div>
                            <div class="text-xs text-white/60 mb-0.5 uppercase tracking-wider">Telepon</div>
                            <p class="text-sm text-white/90">(0541) 260421</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa fa-envelope text-[#41b582]"></i>
                        </div>
                        <div>
                            <div class="text-xs text-white/60 mb-0.5 uppercase tracking-wider">Email</div>
                            <p class="text-sm text-white/90">lsp@politanisamarinda.ac.id</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa fa-clock-o text-[#41b582]"></i>
                        </div>
                        <div>
                            <div class="text-xs text-white/60 mb-0.5 uppercase tracking-wider">Jam Operasional</div>
                            <p class="text-sm text-white/90">Senin – Jumat: 08.00 – 16.00 WITA</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA Pendaftaran --}}
            <div class="bg-gradient-to-br from-[#ba4444] to-[#8b1a1a] rounded-xl p-6 text-white flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center mb-5">
                        <i class="fa fa-id-card text-white text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-xl mb-3 text-white">Siap Bersertifikat?</h3>
                    <p class="text-white/80 text-sm leading-relaxed mb-6">
                        Tingkatkan nilai kompetensi Anda dengan sertifikat resmi BNSP. 
                        Daftarkan diri sekarang dan buktikan keahlian Anda di bidang pertanian.
                    </p>
                </div>
                <div class="space-y-3">
                    <a href="https://wa.me/6281234567890" target="_blank"
                       class="flex items-center justify-center gap-2 w-full bg-white text-btp-red font-semibold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors duration-300 text-sm">
                        <i class="fa fa-whatsapp text-lg"></i>
                        Daftar via WhatsApp
                    </a>
                    <a href="mailto:lsp@politanisamarinda.ac.id"
                       class="flex items-center justify-center gap-2 w-full bg-white/15 border border-white/30 text-white font-semibold py-3 px-6 rounded-lg hover:bg-white/25 transition-colors duration-300 text-sm">
                        <i class="fa fa-envelope"></i>
                        Kirim Email
                    </a>
                </div>
            </div>
        </div>

        {{-- Info Biaya --}}
        <!-- <div class="mt-6 flex items-start gap-4 bg-amber-50 border border-amber-200 rounded-xl p-5">
            <div class="flex-shrink-0 w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                <i class="fa fa-info-circle text-amber-600"></i>
            </div>
            <div>
                <h4 class="font-semibold text-amber-800 mb-1">Informasi Biaya Sertifikasi</h4>
                <p class="text-sm text-amber-700 leading-relaxed">
                    Biaya sertifikasi bervariasi tergantung pada skema kompetensi yang dipilih. 
                    Untuk informasi lengkap mengenai biaya dan bantuan biaya sertifikasi, 
                    silakan hubungi sekretariat LSP melalui kontak di atas.
                </p>
            </div>
        </div> -->
    </article>

</div>
@endsection
