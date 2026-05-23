@extends('layouts.app')

@section('content')
<article class="bg-white p-8 rounded-lg shadow-sm border border-btp-border">
    <!-- Breadcrumb / Back Link -->
    <div class="mb-6">
        <a href="/berita" class="text-btp-red hover:underline flex items-center text-sm font-semibold">
            <i class="fa fa-long-arrow-left mr-2"></i> Kembali ke Daftar Berita
        </a>
    </div>

    <!-- Article Header -->
    <header class="mb-8 border-b border-btp-border pb-6">
        <h1 class="text-3xl md:text-4xl font-serif text-btp-heading mb-4 leading-tight">
            {{ $news->title }}
        </h1>
        <div class="flex flex-wrap items-center text-sm text-btp-text gap-4">
            <span class="flex items-center"><i class="fa fa-calendar text-btp-red mr-2"></i> {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') : '-' }}</span>
            <span class="flex items-center"><i class="fa fa-user text-btp-red mr-2"></i> {{ $news->author ?? 'Admin' }}</span>
            <span class="flex items-center"><i class="fa fa-folder-open-o text-btp-red mr-2"></i> {{ $news->kategori ?? 'Uncategorized' }}</span>
        </div>
    </header>

    <!-- Featured Image -->
    @if($news->getFirstMediaUrl('featured'))
    <div class="mb-8 rounded-lg overflow-hidden border border-btp-border h-64 sm:h-96 w-full">
        <img src="{{ $news->getFirstMediaUrl('featured') }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
    </div>
    @endif

    <!-- Article Content -->
    <div class="prose prose-lg max-w-none text-btp-text leading-relaxed">
        {!! $news->body !!}
    </div>

    <!-- Share & Footer (Optional) -->
    <footer class="mt-12 pt-6 border-t border-btp-border flex items-center justify-between">
        <div class="text-sm text-btp-text">
            <strong>Bagikan:</strong>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors ml-3"><i class="fa fa-facebook-square fa-lg"></i></a>
            <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors ml-2"><i class="fa fa-twitter-square fa-lg"></i></a>
            <a href="#" class="text-gray-400 hover:text-green-500 transition-colors ml-2"><i class="fa fa-whatsapp fa-lg"></i></a>
        </div>
    </footer>
</article>
@endsection
