@extends('layouts.home')

@section('content')
    {{-- Banner Carousel --}}
    <section class="bg-ev-purple">
        <div class="max-w-[1200px] mx-auto">
            <div id="bannerCarousel" class="relative overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" id="bannerTrack">
                    <div class="min-w-full">
                        <div class="bg-gradient-to-r from-ev-purple to-ev-purple-light h-[200px] md:h-[300px] flex items-center justify-center text-white px-8">
                            <div class="text-center">
                                <h2 class="text-2xl md:text-4xl font-bold mb-2">Bem-vindo à Livraria Virtual</h2>
                                <p class="text-sm md:text-lg opacity-90">Milhares de livros novos e usados com preços imbatíveis</p>
                            </div>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <div class="bg-gradient-to-r from-ev-orange to-yellow-500 h-[200px] md:h-[300px] flex items-center justify-center text-white px-8">
                            <div class="text-center">
                                <h2 class="text-2xl md:text-4xl font-bold mb-2">Ofertas Especiais</h2>
                                <p class="text-sm md:text-lg opacity-90">Aproveite descontos incríveis em livros selecionados</p>
                            </div>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <div class="bg-gradient-to-r from-ev-green to-emerald-600 h-[200px] md:h-[300px] flex items-center justify-center text-white px-8">
                            <div class="text-center">
                                <h2 class="text-2xl md:text-4xl font-bold mb-2">Novos Lançamentos</h2>
                                <p class="text-sm md:text-lg opacity-90">Confira os livros que acabaram de chegar</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Carousel Controls --}}
                <button onclick="moveBanner(-1)" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                    <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="moveBanner(1)" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                    <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                {{-- Dots --}}
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
                    <button onclick="goToBanner(0)" class="banner-dot w-3 h-3 rounded-full bg-white transition"></button>
                    <button onclick="goToBanner(1)" class="banner-dot w-3 h-3 rounded-full bg-white/50 transition"></button>
                    <button onclick="goToBanner(2)" class="banner-dot w-3 h-3 rounded-full bg-white/50 transition"></button>
                </div>
            </div>
        </div>
    </section>

    {{-- Highlight Buttons --}}
    <section class="max-w-[1200px] mx-auto px-4 -mt-6 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('books.index') }}" class="bg-white rounded-lg shadow-md p-4 flex items-center gap-3 hover:shadow-lg transition group">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition">
                    <svg class="w-6 h-6 text-ev-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">Acervo</p>
                    <p class="text-xs text-gray-500">Todos os livros</p>
                </div>
            </a>
            @auth
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('books.create') }}" class="bg-white rounded-lg shadow-md p-4 flex items-center gap-3 hover:shadow-lg transition group">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center group-hover:bg-orange-200 transition">
                            <svg class="w-6 h-6 text-ev-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">Cadastrar</p>
                            <p class="text-xs text-gray-500">Novo livro</p>
                        </div>
                    </a>
                @endif
            @endauth
            <a href="{{ route('books.index') }}" class="bg-white rounded-lg shadow-md p-4 flex items-center gap-3 hover:shadow-lg transition group">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center group-hover:bg-purple-200 transition">
                    <svg class="w-6 h-6 text-ev-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">Destaques</p>
                    <p class="text-xs text-gray-500">Mais vistos</p>
                </div>
            </a>
            <a href="{{ route('books.index') }}" class="bg-white rounded-lg shadow-md p-4 flex items-center gap-3 hover:shadow-lg transition group">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">Lançamentos</p>
                    <p class="text-xs text-gray-500">Novidades</p>
                </div>
            </a>
        </div>
    </section>

    {{-- Latest Books Carousel --}}
    <section class="max-w-[1200px] mx-auto px-4 mt-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Últimos livros cadastrados</h2>
            <a href="{{ route('books.index') }}" class="text-ev-purple hover:text-ev-purple-dark text-sm font-medium flex items-center gap-1">
                Ver todos
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        @if ($latestBooks->isEmpty())
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <p class="text-gray-500 text-lg">Nenhum livro cadastrado ainda.</p>
                <a href="{{ route('books.create') }}" class="inline-block mt-4 bg-ev-purple text-white px-6 py-2 rounded-lg hover:bg-ev-purple-dark transition">Cadastrar primeiro livro</a>
            </div>
        @else
            <div class="relative">
                <div id="booksCarousel" class="carousel-scroll flex gap-4 overflow-x-auto pb-4">
                    @foreach ($latestBooks as $book)
                        <a href="{{ route('books.show', $book) }}" class="min-w-[180px] md:min-w-[200px] bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition group flex-shrink-0">
                            <div class="h-[240px] md:h-[280px] book-cover-placeholder flex items-end p-4" style="--cover-from: {{ ['#5A2D82', '#E74C3C', '#27AE60', '#F5A623', '#3498DB', '#9B59B6', '#1ABC9C', '#E67E22'][$loop->index % 8] }}; --cover-to: {{ ['#7B4FA2', '#C0392B', '#229954', '#F39C12', '#2980B9', '#8E44AD', '#16A085', '#D35400'][$loop->index % 8] }};">
                                <div class="w-full">
                                    <p class="text-white font-bold text-sm leading-tight drop-shadow-lg line-clamp-3">{{ $book->title }}</p>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-semibold text-sm text-gray-800 line-clamp-2 group-hover:text-ev-purple transition leading-tight">{{ $book->title }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $book->author }}</p>
                                @if ($book->published_at)
                                    <p class="text-xs text-gray-400 mt-1">{{ $book->published_at->format('Y') }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                <button onclick="scrollCarousel('booksCarousel', -1)" class="absolute left-0 top-[120px] -translate-y-1/2 bg-white shadow-lg rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-50 transition z-10 hidden md:flex">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="scrollCarousel('booksCarousel', 1)" class="absolute right-0 top-[120px] -translate-y-1/2 bg-white shadow-lg rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-50 transition z-10 hidden md:flex">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        @endif
    </section>

    {{-- Featured Books --}}
    @if ($featuredBooks->isNotEmpty())
        <section class="max-w-[1200px] mx-auto px-4 mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">Destaques para você</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach ($featuredBooks as $book)
                    <a href="{{ route('books.show', $book) }}" class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition group">
                        <div class="h-[180px] md:h-[200px] book-cover-placeholder flex items-center justify-center p-3" style="--cover-from: {{ ['#5A2D82', '#E74C3C', '#27AE60', '#F5A623', '#3498DB', '#9B59B6'][$loop->index % 6] }}; --cover-to: {{ ['#7B4FA2', '#C0392B', '#229954', '#F39C12', '#2980B9', '#8E44AD'][$loop->index % 6] }};">
                            <p class="text-white font-bold text-xs text-center leading-tight drop-shadow-lg line-clamp-4">{{ $book->title }}</p>
                        </div>
                        <div class="p-3">
                            <h3 class="font-semibold text-xs text-gray-800 line-clamp-2 group-hover:text-ev-purple transition">{{ $book->title }}</h3>
                            <p class="text-xs text-gray-500 mt-1 truncate">{{ $book->author }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Authors Section --}}
    @if ($authors->isNotEmpty())
        <section class="max-w-[1200px] mx-auto px-4 mt-10">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Autores em destaque</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
                @foreach ($authors as $author)
                    <a href="{{ route('books.index', ['search' => $author]) }}" class="bg-white rounded-lg shadow-sm p-4 flex items-center gap-3 hover:shadow-md transition group">
                        <div class="w-10 h-10 bg-ev-purple/10 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-ev-purple font-bold text-sm">{{ strtoupper(substr($author, 0, 1)) }}</span>
                        </div>
                        <p class="text-sm text-gray-700 font-medium truncate group-hover:text-ev-purple transition">{{ $author }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Info Section --}}
    <section class="max-w-[1200px] mx-auto px-4 mt-10">
        <div class="bg-white rounded-lg shadow-sm p-6 md:p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Sobre a Livraria Virtual</h2>
            <div class="grid md:grid-cols-3 gap-6 text-sm text-gray-600 leading-relaxed">
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Milhares de livros</h3>
                    <p>Encontre livros novos, seminovos e usados de todos os gêneros. Literatura, biografias, ciência, tecnologia e muito mais.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Preços imbatíveis</h3>
                    <p>Compare preços de diferentes vendedores e encontre as melhores ofertas. Economize em suas compras de livros.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Entrega para todo o Brasil</h3>
                    <p>Receba seus livros em qualquer lugar do Brasil. Frete grátis em pedidos selecionados.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        let bannerIndex = 0;
        const bannerCount = 3;

        function moveBanner(direction) {
            bannerIndex = (bannerIndex + direction + bannerCount) % bannerCount;
            updateBanner();
        }

        function goToBanner(index) {
            bannerIndex = index;
            updateBanner();
        }

        function updateBanner() {
            const track = document.getElementById('bannerTrack');
            track.style.transform = `translateX(-${bannerIndex * 100}%)`;
            document.querySelectorAll('.banner-dot').forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === bannerIndex);
                dot.classList.toggle('bg-white/50', i !== bannerIndex);
            });
        }

        function scrollCarousel(id, direction) {
            const el = document.getElementById(id);
            el.scrollBy({ left: direction * 400, behavior: 'smooth' });
        }

        setInterval(() => moveBanner(1), 5000);
    </script>
@endsection
