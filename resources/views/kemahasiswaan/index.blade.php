@extends('layouts.app')

@section('hero')
{{-- Hero Section --}}
<div class="relative overflow-hidden" style="background: linear-gradient(135deg, #1a3a1a 0%, #1e4d2b 40%, #145a32 70%, #41b582 100%); min-height: 260px;">
    {{-- Decorative blobs --}}
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-8 -right-8 w-64 h-64 bg-[#41b582] opacity-15 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 -left-8 w-56 h-56 bg-green-900 opacity-20 rounded-full blur-3xl animate-pulse" style="animation-delay:1.2s"></div>
    </div>
    {{-- Grid overlay --}}
    <div class="absolute inset-0 opacity-5" style="background-image:linear-gradient(rgba(255,255,255,.1) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.1) 1px,transparent 1px);background-size:40px 40px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 flex items-center min-h-[260px]">
        <div class="w-full">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-3 leading-tight">
                Kemahasiswaan
            </h1>
            <p class="text-white/70 text-lg max-w-xl leading-relaxed">
                Informasi seputar kegiatan mahasiswa, prestasi, dan organisasi kemahasiswaan 
                Program Studi Budidaya Tanaman Perkebunan.
            </p>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="space-y-8">

    @if($items->isEmpty())
    {{-- Empty State --}}
    <div class="text-center py-20 bg-gray-50 border border-dashed border-gray-300 rounded-xl">
        <i class="fa fa-folder-open-o text-5xl text-gray-300 mb-4 block"></i>
        <h3 class="text-xl font-serif text-btp-heading mb-2">Belum Ada Konten</h3>
        <p class="text-btp-text text-sm">Data kemahasiswaan belum tersedia saat ini.</p>
    </div>

    @else

    {{-- ===== DROPDOWN SELECTOR ===== --}}
    <div x-data="{ open: false, selectedId: '{{ $selected?->id ?? '' }}' }" class="relative">

        <div class="flex items-center gap-3 mb-2">
            <span class="w-1 h-7 bg-btp-green rounded-full"></span>
            <label class="text-sm font-semibold text-btp-heading uppercase tracking-wider">
                Pilih Kategori Kemahasiswaan
            </label>
        </div>

        {{-- Custom Dropdown Button --}}
        <button
            @click="open = !open"
            class="w-full flex items-center justify-between gap-3 bg-white border-2 border-btp-border hover:border-btp-green focus:border-btp-green focus:outline-none rounded-xl px-5 py-4 transition-colors duration-200 shadow-sm group"
        >
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 bg-btp-green/10 rounded-lg flex items-center justify-center">
                    <i class="fa fa-users text-btp-green"></i>
                </span>
                <span class="font-semibold text-btp-heading text-left">
                    {{ $selected?->nama ?? 'Pilih...' }}
                </span>
            </div>
            <i class="fa fa-chevron-down text-gray-400 group-hover:text-btp-green transition-all duration-200"
               :class="open ? 'rotate-180' : ''" style="transition: transform .2s;"></i>
        </button>

        {{-- Dropdown List --}}
        <div
            x-show="open"
            x-cloak
            @click.outside="open = false"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute top-full left-0 right-0 mt-2 bg-white border border-btp-border rounded-xl shadow-xl z-40 overflow-hidden"
        >
            @foreach($items as $item)
            <a
                href="{{ route('kemahasiswaan.index', ['selected' => $item->id]) }}"
                class="flex items-center gap-3 px-5 py-3.5 text-sm hover:bg-green-50 hover:text-btp-green transition-colors border-b border-btp-border last:border-0
                    {{ ($selected && $selected->id === $item->id) ? 'bg-green-50 text-btp-green font-semibold' : 'text-btp-text' }}"
            >
                <span class="w-6 h-6 rounded-full bg-btp-green/10 flex items-center justify-center flex-shrink-0">
                    <i class="fa fa-circle text-btp-green" style="font-size:6px;"></i>
                </span>
                {{ $item->nama }}
                @if($selected && $selected->id === $item->id)
                <i class="fa fa-check text-btp-green ml-auto"></i>
                @endif
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===== KONTEN YANG DIPILIH ===== --}}
    @if($selected)
    <article class="bg-white border border-btp-border rounded-xl overflow-hidden shadow-sm">

        {{-- Gambar (jika ada via Spatie Media) --}}
        @if($selected->getFirstMediaUrl('image'))
        <div class="relative h-72 overflow-hidden">
            <img
                src="{{ $selected->getFirstMediaUrl('image') }}"
                alt="{{ $selected->judul }}"
                class="w-full h-full object-cover"
            >
            {{-- Gradient overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
                <span class="inline-flex items-center gap-2 bg-btp-green/90 text-white text-xs font-semibold px-3 py-1 rounded-full mb-2">
                    <i class="fa fa-tag"></i> {{ $selected->nama }}
                </span>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-white leading-tight">
                    {{ $selected->judul }}
                </h2>
            </div>
        </div>
        @else
        {{-- Header tanpa gambar --}}
        <div class="bg-gradient-to-r from-[#1e4d2b] to-[#41b582] p-6 md:p-8">
            <span class="inline-flex items-center gap-2 bg-white/15 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3">
                <i class="fa fa-tag"></i> {{ $selected->nama }}
            </span>
            <h2 class="text-2xl md:text-3xl font-serif font-bold text-white leading-tight">
                {{ $selected->judul }}
            </h2>
        </div>
        @endif

        {{-- Body Content --}}
        <div class="p-6 md:p-8">
            @if($selected->body)
            <div class="prose prose-lg max-w-none text-btp-text leading-relaxed
                        prose-headings:font-serif prose-headings:text-btp-heading
                        prose-a:text-btp-green prose-a:hover:underline
                        prose-strong:text-btp-heading
                        prose-li:marker:text-btp-green">
                {!! nl2br(e($selected->body)) !!}
            </div>
            @else
            <div class="text-center py-10 text-gray-400">
                <i class="fa fa-file-text-o text-4xl mb-3 block"></i>
                <p class="text-sm">Konten belum tersedia.</p>
            </div>
            @endif
        </div>

        {{-- Footer Card --}}
        <div class="px-6 md:px-8 py-4 bg-gray-50 border-t border-btp-border flex items-center justify-between text-xs text-gray-400">
            <span class="flex items-center gap-1.5">
                <i class="fa fa-calendar-o"></i>
                {{ $selected->updated_at->translatedFormat('d F Y') }}
            </span>
            <span class="flex items-center gap-1.5">
                <i class="fa fa-folder-o"></i>
                {{ $selected->nama }}
            </span>
        </div>

    </article>
    @endif

    {{-- ===== DAFTAR SEMUA ITEM (mini cards) ===== --}}
    @if($items->count() > 1)
    <div class="border-t border-btp-border pt-8">
        <div class="flex items-center gap-3 mb-5">
            <span class="w-1 h-7 bg-btp-red rounded-full"></span>
            <h3 class="text-xl font-serif text-btp-heading">Kategori Lainnya</h3>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($items as $item)
            @if(!$selected || $selected->id !== $item->id)
            <a
                href="{{ route('kemahasiswaan.index', ['selected' => $item->id]) }}"
                class="flex items-start gap-4 p-4 bg-white border border-btp-border rounded-xl hover:border-btp-green hover:shadow-md transition-all duration-300 group"
            >
                {{-- Thumbnail --}}
                <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 flex items-center justify-center">
                    @if($item->getFirstMediaUrl('image'))
                    <img src="{{ $item->getFirstMediaUrl('image') }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                    <i class="fa fa-users text-2xl text-gray-300"></i>
                    @endif
                </div>
                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <span class="text-xs font-semibold text-btp-green uppercase tracking-wide block mb-0.5">{{ $item->nama }}</span>
                    <h4 class="font-semibold text-btp-heading text-sm leading-snug line-clamp-2 group-hover:text-btp-green transition-colors">
                        {{ $item->judul }}
                    </h4>
                    @if($item->body)
                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">{{ Str::limit(strip_tags($item->body), 80) }}</p>
                    @endif
                </div>
                <i class="fa fa-angle-right text-gray-300 group-hover:text-btp-green transition-colors mt-1 flex-shrink-0"></i>
            </a>
            @endif
            @endforeach
        </div>
    </div>
    @endif

    @endif {{-- end if items not empty --}}

</div>
@endsection
