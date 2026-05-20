@extends('layouts.app')

@section('content')
<header class="mb-8">
    <h1 class="text-3xl font-serif text-btp-heading mb-2">Fasilitas Laboratorium</h1>
    <p class="text-base text-btp-text">Pusat riset, praktikum, dan pengembangan inovasi perkebunan berkelanjutan.</p>
</header>

<div class="grid grid-cols-1 gap-6">
    @foreach($labs as $lab)
    <div class="bg-white border border-btp-border p-4 rounded-lg hover:-translate-y-1 hover:border-btp-red transition-all duration-300 flex flex-col md:flex-row gap-4 group">
        <div class="md:w-1/3 h-48 bg-gray-100 rounded-lg overflow-hidden shrink-0">
            @if($lab->hasMedia('photo'))
            <img alt="{{ $lab->nama }}" class="w-full h-full object-cover" src="{{ $lab->getFirstMediaUrl('photo') }}"/>
            @else
            <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">No Image</div>
            @endif
        </div>
        <div class="flex flex-col justify-between flex-grow">
            <div>
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-2xl font-serif text-btp-red">{{ $lab->nama }}</h3>
                </div>
                <p class="text-base text-btp-text line-clamp-3 mb-4">
                    {{ $lab->caption }}
                </p>
            </div>
            <a href="/laboratorium/{{ $lab->id }}" class="self-start px-6 py-2 bg-btp-red text-white font-semibold rounded-lg hover:bg-btp-red-hover transition-all duration-300 flex items-center gap-2 group-hover:px-7">
                Lihat Detail
                <i class="fa fa-chevron-right text-sm"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
