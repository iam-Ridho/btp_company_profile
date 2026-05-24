@extends('layouts.app')

@section('content')
<div class="bg-white border border-btp-border rounded-lg overflow-hidden shadow-sm">
    <div class="h-64 md:h-96 w-full bg-gray-100 relative">
        @if($lab->hasMedia('photo'))
        <img alt="{{ $lab->nama }}" class="w-full h-full object-cover" src="{{ $lab->getFirstMediaUrl('photo') }}"/>
        @else
        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">No Image</div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 w-full text-white">
            <h1 class="text-4xl font-serif font-bold mb-2">{{ $lab->nama }}</h1>
        </div>
    </div>
    <div class="p-8">
        <a href="/laboratorium" class="inline-flex items-center text-btp-red hover:text-btp-red-hover hover:underline mb-8 transition-colors font-semibold">
            <i class="fa fa-arrow-left mr-2 text-sm"></i> Kembali ke Daftar Laboratorium
        </a>
        
        <div class="prose max-w-none text-btp-text leading-relaxed">
            <h3 class="text-2xl font-serif text-btp-heading mb-4 mt-8">Profil Laboratorium</h3>
            <p class="text-xl font-semibold mb-8 text-btp-heading border-l-4 border-btp-red pl-4 py-1">{{ $lab->caption }}</p>
        </div>
    </div>
</div>
@endsection
