@extends('layouts.app')

@section('content')
<div class="mb-stack-lg">
<h1 class="font-headline-lg text-headline-lg text-btp-red mb-2">Data Dosen</h1>
<div class="h-1 w-20 bg-btp-red"></div>
</div>
<!-- Dosen Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-stack-md">
@foreach($dosens as $dosen)
<div class="bg-white border border-btp-border rounded-lg overflow-hidden flex flex-col transition-all hover:border-primary/50">
<div class="h-64 bg-gray-100 relative">
@if($dosen->hasMedia('photo'))
<img alt="{{ $dosen->nama }}" class="w-full h-full object-cover" src="{{ $dosen->getFirstMediaUrl('photo') }}"/>
@else
<div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">
<span>No Image</span>
</div>
@endif
</div>
<div class="p-4 flex-grow flex flex-col justify-between">
<div>
<h3 class="font-label-md text-label-md text-btp-red mb-1">{{ $dosen->nama }}</h3>
<p class="text-[12px] text-btp-text-variant font-label-sm mb-2">NIP: {{ $dosen->nip ?: '-' }}</p>
</div>
</div>
</div>
@endforeach
</div>
@endsection
