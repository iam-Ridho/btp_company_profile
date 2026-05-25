<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budidaya Tanaman Perkebunan – Website Prodi Budidaya Tanaman Perkebunan Politani Samarinda</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <!-- Alpine.js for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'btp-red': '#ba4444',
                        'btp-red-hover': '#d16a57',
                        'btp-green': '#41b582',
                        'btp-text': '#444444',
                        'btp-heading': '#333333',
                        'btp-border': '#e8e8e8',
                    },
                    fontFamily: {
                        'sans': ['"Open Sans"', 'sans-serif'],
                        'serif': ['"Roboto Slab"', 'serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Open Sans', sans-serif; color: #444444; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Roboto Slab', serif; color: #333333; }
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('http://btp.politanisamarinda.ac.id/wp-content/uploads/2019/10/WhatsApp-Image-2019-10-27-at-13.02.23.jpeg');
            background-size: cover;
            background-position: center;
        }
        .footer-bg {
            background-color: #41b582;
            background-image: linear-gradient(rgba(65, 181, 130, 0.9), rgba(65, 181, 130, 0.9)), url('http://btp.politanisamarinda.ac.id/wp-content/uploads/2019/10/WhatsApp-Image-2019-10-27-at-13.02.23.jpeg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-white">

    <!-- Top Navigation -->
    <header x-data="{ mobileMenuOpen: false }" class="bg-[#444444] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Title -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="flex-shrink-0">
                        <img class="h-12 w-12" src="https://btp.politanisamarinda.ac.id/wp-content/uploads/2022/01/cropped-cropped-logo-politani-white.png" alt="Logo">
                    </a>
                    <a href="#" class="text-l font-serif font-bold text-white transition-colors">
                        Budidaya Tanaman Perkebunan
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex items-center h-full">
                    <a href="/" class="h-full flex items-center px-4 text-sm font-semibold text-white whitespace-nowrap {{ Request::is('/') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] transition-colors' }}">HOME</a>
                    
                    <!-- PROFIL KAMI Dropdown -->
                    <div class="relative group h-full flex items-center">
                        <a href="#" class="h-full flex items-center px-4 text-sm font-semibold text-white whitespace-nowrap {{ Request::is('visi-misi') || Request::is('data-dosen') || Request::is('data-plp-admin') || Request::is('laboratorium*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] transition-colors' }}">
                            PROFIL KAMI <i class="fa fa-caret-down ml-1"></i>
                        </a>
                        <div class="absolute top-full left-0 hidden group-hover:block w-56 bg-white shadow-lg border-t-2 border-btp-red z-50">
                            <a href="/visi-misi" class="block px-4 py-3 text-sm text-btp-text hover:bg-gray-100 hover:text-btp-red border-b border-gray-100">Visi dan Misi</a>
                            <a href="/data-dosen" class="block px-4 py-3 text-sm text-btp-text hover:bg-gray-100 hover:text-btp-red border-b border-gray-100">Data Dosen</a>
                            <a href="/data-plp-admin" class="block px-4 py-3 text-sm text-btp-text hover:bg-gray-100 hover:text-btp-red border-b border-gray-100">Data PLP & Admin</a>
                            <a href="/laboratorium" class="block px-4 py-3 text-sm text-btp-text hover:bg-gray-100 hover:text-btp-red">Laboratorium</a>
                        </div>
                    </div>
                    
                    <a href="/berita" class="h-full flex items-center px-4 text-sm font-semibold text-white whitespace-nowrap {{ Request::is('berita*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] transition-colors' }}">
                        BERITA & INFORMASI
                    </a>
                    

                    
                    <!-- KEMAHASISWAAN Dropdown -->
                    <div class="relative group h-full flex items-center">
                        <a href="/kemahasiswaan" class="h-full flex items-center px-4 text-sm font-semibold text-white whitespace-nowrap {{ Request::is('kemahasiswaan*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] transition-colors' }}">
                            KEMAHASISWAAN <i class="fa fa-caret-down ml-1"></i>
                        </a>
                        <div class="absolute top-full left-0 hidden group-hover:block w-56 bg-white shadow-lg border-t-2 border-btp-red z-50">
                            @php $kemahasiswaanNavItems = \App\Models\Kemahasiswaan::all(); @endphp
                            @if($kemahasiswaanNavItems->isNotEmpty())
                                @foreach($kemahasiswaanNavItems as $navItem)
                                <a href="/kemahasiswaan?selected={{ $navItem->id }}" class="block px-4 py-3 text-sm text-btp-text hover:bg-gray-100 hover:text-btp-red border-b border-gray-100 last:border-0">
                                    {{ $navItem->nama }}
                                </a>
                                @endforeach
                            @else
                                <a href="/kemahasiswaan" class="block px-4 py-3 text-sm text-btp-text hover:bg-gray-100 hover:text-btp-red">Kemahasiswaan</a>
                            @endif
                        </div>
                    </div>
                    
                    <a href="/lsp" class="h-full flex items-center px-4 text-sm font-semibold text-white whitespace-nowrap {{ Request::is('lsp*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] transition-colors' }}">LSP</a>
                    <a href="/produk" class="h-full flex items-center px-4 text-sm font-semibold text-white whitespace-nowrap {{ Request::is('produk*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] transition-colors' }}">PRODUK</a>
                    
                    <button class="text-white hover:bg-[#cf2e2e] px-4 h-full flex items-center justify-center transition-colors">
                        <i class="fa fa-search"></i>
                    </button>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-gray-300 focus:outline-none">
                        <i class="fa fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-[#333333] border-t border-gray-600 pb-4">
                <nav class="flex flex-col">
                    <a href="{{ url('/') }}" class="block px-4 py-3 text-sm font-medium text-white {{ Request::is('/') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] hover:text-white' }}">HOME</a>
                    
                    <!-- Profil Kami Mobile -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-3 text-sm font-medium text-white {{ Request::is('visi-misi') || Request::is('data-dosen') || Request::is('data-plp-admin') || Request::is('laboratorium*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e]' }}">
                            PROFIL KAMI <i class="fa" :class="open ? 'fa-caret-up' : 'fa-caret-down'"></i>
                        </button>
                        <div x-show="open" class="bg-[#444444]">
                            <a href="/visi-misi" class="block pl-8 pr-4 py-2 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#cf2e2e]">Visi dan Misi</a>
                            <a href="/data-dosen" class="block pl-8 pr-4 py-2 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#cf2e2e]">Data Dosen</a>
                            <a href="/data-plp-admin" class="block pl-8 pr-4 py-2 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#cf2e2e]">Data PLP & Admin</a>
                            <a href="/laboratorium" class="block pl-8 pr-4 py-2 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#cf2e2e]">Laboratorium</a>
                        </div>
                    </div>

                    <a href="/berita" class="block px-4 py-3 text-sm font-medium text-white {{ Request::is('berita*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] hover:text-white' }}">
                        BERITA & INFORMASI
                    </a>


                    
                    <!-- Kemahasiswaan Mobile -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-3 text-sm font-medium text-white {{ Request::is('kemahasiswaan*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e]' }}">
                            KEMAHASISWAAN <i class="fa" :class="open ? 'fa-caret-up' : 'fa-caret-down'"></i>
                        </button>
                        <div x-show="open" class="bg-[#444444]">
                            @php $kemahasiswaanNavItemsMobile = \App\Models\Kemahasiswaan::all(); @endphp
                            @if($kemahasiswaanNavItemsMobile->isNotEmpty())
                                @foreach($kemahasiswaanNavItemsMobile as $navItem)
                                <a href="/kemahasiswaan?selected={{ $navItem->id }}" class="block pl-8 pr-4 py-2 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#cf2e2e]">
                                    {{ $navItem->nama }}
                                </a>
                                @endforeach
                            @else
                                <a href="/kemahasiswaan" class="block pl-8 pr-4 py-2 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#cf2e2e]">Kemahasiswaan</a>
                            @endif
                        </div>
                    </div>

                    <a href="/lsp" class="block px-4 py-3 text-sm font-medium text-white {{ Request::is('lsp*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] hover:text-white' }}">LSP</a>
                    <a href="/produk" class="block px-4 py-3 text-sm font-medium text-white {{ Request::is('produk*') ? 'bg-[#cf2e2e]' : 'hover:bg-[#cf2e2e] hover:text-white' }}">PRODUK</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Area -->
    @yield('hero')

    <!-- Main Content Area -->
    <div class="min-h-screen max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            
            <!-- Left Content Area - 8 columns -->
            <div class="md:col-span-8 space-y-10">
                @yield('content')
            </div>

            <!-- Right Sidebar - 4 columns -->
            <div class="md:col-span-4 pl-0 md:pl-8 border-l-0 md:border-l border-btp-border space-y-8">
                
                <!-- Search Widget -->
                <div class="widget">
                    <form class="flex">
                        <input type="text" placeholder="Search.." class="flex-grow px-4 py-2 border border-btp-border focus:outline-none focus:border-btp-red">
                        <button type="button" class="bg-btp-red text-white px-4 py-2 hover:bg-btp-red-hover transition-colors">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Recent Posts Widget -->
                <div class="widget">
                    <h3 class="text-xl font-serif text-btp-heading mb-4">Pos-pos Terbaru</h3>
                    <ul class="space-y-3">
                        @php
                            $recentPosts = \App\Models\News::latest()->take(5)->get();
                        @endphp
                        @foreach($recentPosts as $post)
                        <li>
                            <a href="/berita/{{ $post->id }}" class="text-btp-red hover:text-btp-red-hover hover:underline transition-colors block border-b border-btp-border pb-2">{{ $post->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Categories Widget -->
                <div class="widget">
                    <h3 class="text-xl font-serif text-btp-heading mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        @php
                            $categories = \App\Models\News::whereNotNull('kategori')->where('kategori', '!=', '')->select('kategori')->distinct()->get();
                        @endphp
                        @foreach($categories as $cat)
                        <li>
                            <a href="/berita?kategori={{ urlencode($cat->kategori) }}" class="text-btp-red hover:text-btp-red-hover hover:underline transition-colors {{ Request::get('kategori') == $cat->kategori ? 'font-bold' : '' }}">
                                {{ $cat->kategori }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Visitor Stats Widget -->
                <div class="widget">
                    <h3 class="text-xl font-serif text-btp-heading mb-4">Statistik Pengunjung</h3>
                    @php
                        $visitorStats = \App\Services\VisitorService::stats();
                    @endphp
                    <ul class="space-y-2 text-sm text-btp-text border border-btp-border p-4 rounded bg-gray-50">
                        <li class="flex justify-between items-center border-b border-btp-border pb-2">
                            <span class="font-semibold flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                Pengunjung Online:
                            </span> 
                            <span class="bg-white px-2 py-0.5 rounded border border-gray-200">{{ number_format($visitorStats['online'], 0, ',', '.') }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-btp-border py-2">
                            <span class="font-semibold"><i class="fa fa-calendar-o mr-1"></i> Hari Ini:</span> 
                            <span class="bg-white px-2 py-0.5 rounded border border-gray-200">{{ number_format($visitorStats['today'], 0, ',', '.') }}</span>
                        </li>
                        <li class="flex justify-between items-center pt-2">
                            <span class="font-semibold"><i class="fa fa-bar-chart mr-1"></i> Total Views:</span> 
                            <span class="bg-white px-2 py-0.5 rounded border border-gray-200">{{ number_format($visitorStats['total'], 0, ',', '.') }}</span>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-bg text-white py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="mb-6 font-serif text-lg">Budidaya Tanaman Perkebunan &copy; {{ date('Y') }}</p>
            
            <div class="flex flex-wrap justify-center gap-x-4 gap-y-2 text-sm">
                <a href="/berita" class="hover:underline">BERITA DAN INFORMASI</a>
                <span class="text-white/50">|</span>
                <a href="/data-dosen" class="hover:underline">DATA DOSEN</a>
                <span class="text-white/50">|</span>
                <a href="/data-plp-admin" class="hover:underline">DATA PLP & ADMIN</a>
                <span class="text-white/50">|</span>
                <a href="#" class="hover:underline">Kegiatan Hima</a>
                <span class="text-white/50">|</span>
                <a href="#" class="hover:underline">KEGIATAN PRODI</a>
                <span class="text-white/50">|</span>
                <a href="#" class="hover:underline">KEMAHASISWAAN</a>
                <span class="text-white/50">|</span>
                <a href="/lsp" class="hover:underline">LSP</a>
                <span class="text-white/50">|</span>
                <a href="#" class="hover:underline">Lab Agronomi</a>
                <span class="text-white/50">|</span>
                <a href="#" class="hover:underline">Lab Kebun</a>
                <span class="text-white/50">|</span>
                <a href="#" class="hover:underline">Lab Produksi</a>
            </div>
        </div>
    </footer>

</body>
</html>
