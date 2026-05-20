@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-serif text-btp-heading mb-2">Berita & Informasi</h1>
    <div class="h-1 w-20 bg-btp-red"></div>
</div>

@foreach($beritas as $berita)
<article class="border-b border-btp-border pb-8 mb-8">
    <h2 class="text-2xl font-serif mb-3">
        <a href="#" class="text-btp-heading hover:text-btp-red transition-colors">{{ $berita['title'] }}</a>
    </h2>
    <div class="text-sm text-btp-text mb-4 flex items-center space-x-4">
        <span><i class="fa fa-calendar text-btp-red mr-1"></i> {{ $berita['date'] }}</span>
        <span><i class="fa fa-user text-btp-red mr-1"></i> by {{ $berita['author'] }}</span>
        <span><i class="fa fa-folder-open-o text-btp-red mr-1"></i> {{ $berita['category'] }}</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="overflow-hidden">
            <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="w-full h-auto hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <p class="text-btp-text leading-relaxed">
                {{ $berita['excerpt'] }}
            </p>
        </div>
    </div>
</article>
@endforeach

<div class="mt-8">
    {{ $beritas->links() }}
</div>
@endsection
