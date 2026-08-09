<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Livraria Virtual - Livros novos e usados com preços imbatíveis!')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ev: {
                            purple: '#7C3AED',
                            'purple-dark': '#6D28D9',
                            'purple-light': '#A78BFA',
                            'purple-50': '#F5F3FF',
                            orange: '#F97316',
                            'orange-dark': '#EA580C',
                            green: '#10B981',
                            red: '#EF4444',
                            'gray-bg': '#FAFAFA',
                            'gray-light': '#F3F4F6',
                            'gray-text': '#6B7280',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(124, 58, 237, 0.08)',
                        'glass-lg': '0 16px 48px 0 rgba(124, 58, 237, 0.12)',
                        'card': '0 4px 24px -1px rgba(0, 0, 0, 0.06), 0 2px 8px -1px rgba(0, 0, 0, 0.04)',
                        'card-hover': '0 12px 40px -4px rgba(0, 0, 0, 0.1), 0 4px 16px -2px rgba(0, 0, 0, 0.06)',
                    },
                    borderRadius: {
                        '4xl': '2rem',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'pulse-soft': 'pulseSoft 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        pulseSoft: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' },
                        },
                    },
                    backdropBlur: {
                        'xs': '2px',
                    }
                }
            }
        }
    </script>
    <style>
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .book-cover-placeholder {
            background: linear-gradient(135deg, var(--cover-from) 0%, var(--cover-to) 100%);
        }
        .carousel-scroll {
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .carousel-scroll::-webkit-scrollbar {
            display: none;
        }
        .banner-slide {
            animation: fadeIn 0.5s ease-in-out;
        }
        .nav-item:hover .nav-submenu {
            display: block;
        }
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .glass-strong {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .gradient-text {
            background: linear-gradient(135deg, #7C3AED 0%, #A78BFA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
        }
        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
            border-color: #7C3AED;
        }
        .input-modern {
            transition: all 0.2s ease;
        }
        .input-modern:focus {
            transform: scale(1.01);
        }
    </style>
    @yield('head')
</head>
<body class="bg-ev-gray-bg text-gray-900 antialiased flex flex-col min-h-screen font-sans">
    {{-- Top Bar --}}
    <div class="bg-gradient-to-r from-ev-purple to-ev-purple-dark text-white text-xs">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 flex items-center justify-between h-9">
            <p class="hidden sm:block opacity-90">Compre aqui livros novos, usados e seminovos de milhares de sebos e livrarias.</p>
            <div class="flex items-center gap-5">
                <a href="#" class="hover:opacity-80 transition-opacity">Quero Vender</a>
                <a href="#" class="hover:opacity-80 transition-opacity">Painel do Livreiro</a>
                <a href="#" class="hover:opacity-80 transition-opacity">Central de ajuda</a>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <header class="glass-strong border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 flex items-center gap-4 h-16 lg:h-18">
            {{-- Mobile Menu Button --}}
            <button class="lg:hidden text-ev-purple p-2 -ml-2 rounded-xl hover:bg-ev-purple-50 transition-colors" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex-shrink-0 group">
                <div class="flex items-center gap-2.5">
                    <div class="w-10 h-10 bg-gradient-to-br from-ev-purple to-ev-purple-dark rounded-xl flex items-center justify-center shadow-glass group-hover:shadow-glass-lg transition-shadow">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM4 18V6h7v12H4zm9 0V6h7v12h-7zM6 8h3v2H6V8zm0 4h3v2H6v-2zm5-4h3v2h-3V8zm0 4h3v2h-3v-2z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold gradient-text hidden sm:block">Livraria Virtual</span>
                </div>
            </a>

            {{-- Search Bar --}}
            <div class="flex-1 max-w-2xl">
                <form action="{{ route('books.index') }}" method="GET" class="relative">
                    <input
                        type="text"
                        name="search"
                        placeholder="O que você está procurando?"
                        class="input-modern w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-2.5 pr-14 text-sm focus:bg-white focus:border-ev-purple transition-all"
                    >
                    <button type="submit" class="absolute right-1.5 top-1.5 bottom-1.5 bg-gradient-to-r from-ev-purple to-ev-purple-dark text-white px-4 rounded-xl hover:shadow-glass transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </form>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('books.index') }}" class="text-ev-purple hover:text-ev-purple-dark transition-colors hidden sm:flex items-center gap-1.5 text-sm font-medium px-3 py-2 rounded-xl hover:bg-ev-purple-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <span>Acervo</span>
                </a>
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('books.create') }}" class="bg-gradient-to-r from-ev-orange to-ev-orange-dark text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:shadow-lg transition-all hidden sm:block">
                            Cadastrar livro
                        </a>
                    @endif
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-sm text-gray-700 hover:text-ev-purple transition-colors px-3 py-2 rounded-xl hover:bg-ev-purple-50">
                            <div class="w-8 h-8 bg-gradient-to-br from-ev-purple to-ev-purple-light rounded-full flex items-center justify-center text-white font-medium text-xs">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden sm:block font-medium">{{ Str::limit(auth()->user()->name, 15) }}</span>
                            <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="hidden group-hover:block absolute right-0 top-full mt-2 bg-white border border-gray-100 rounded-2xl shadow-card-hover py-2 min-w-[200px] z-50">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-xs text-gray-400 mb-0.5">Logado como</p>
                                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                <span class="inline-block mt-1.5 text-xs px-2.5 py-1 rounded-lg {{ auth()->user()->isAdmin() ? 'bg-ev-purple-50 text-ev-purple font-medium' : 'bg-gray-100 text-gray-600' }}">
                                    {{ auth()->user()->isAdmin() ? 'Admin' : 'Usuário' }}
                                </span>
                            </div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-ev-purple transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Sair
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-ev-purple text-white hover:bg-ev-purple-dark transition-all hidden sm:flex items-center gap-1.5 text-sm font-semibold px-5 py-2.5 rounded-xl shadow-glass hover:shadow-glass-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Entrar
                    </a>
                @endauth
            </div>
        </div>
    </header>

    {{-- Navigation --}}
    <nav class="bg-white border-b border-gray-100 hidden lg:block">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6">
            <ul class="flex items-center gap-1 text-sm">
                <li class="nav-item">
                    <a href="{{ route('books.index') }}" class="flex items-center gap-1.5 px-4 py-3.5 text-gray-700 hover:text-ev-purple font-medium rounded-lg hover:bg-ev-purple-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Acervo
                    </a>
                </li>
                @isset($authors)
                    <li class="nav-item relative group">
                        <a href="#" class="flex items-center gap-1.5 px-4 py-3.5 text-gray-700 hover:text-ev-purple font-medium rounded-lg hover:bg-ev-purple-50 transition-colors">
                            Autores
                            <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        <div class="nav-submenu hidden absolute top-full left-0 bg-white border border-gray-100 rounded-2xl shadow-card-hover py-2 min-w-[220px] z-50">
                            @foreach ($authors->take(6) as $author)
                                <a href="#" class="block px-4 py-2.5 text-gray-700 hover:bg-ev-purple-50 hover:text-ev-purple transition-colors">{{ $author }}</a>
                            @endforeach
                        </div>
                    </li>
                @endisset
                <li>
                    <a href="{{ route('books.index') }}" class="px-4 py-3.5 text-gray-700 hover:text-ev-purple font-medium block rounded-lg hover:bg-ev-purple-50 transition-colors">Acervo completo</a>
                </li>
                @auth
                    @if (auth()->user()->isAdmin())
                        <li>
                            <a href="{{ route('books.create') }}" class="px-4 py-3.5 text-gray-700 hover:text-ev-purple font-medium block rounded-lg hover:bg-ev-purple-50 transition-colors">Novo livro</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden fixed inset-0 z-50 lg:hidden">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="document.getElementById('mobileMenu').classList.add('hidden')"></div>
        <div class="absolute left-0 top-0 bottom-0 w-80 bg-white shadow-2xl overflow-y-auto animate-fade-in">
            <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-ev-purple to-ev-purple-dark rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM4 18V6h7v12H4zm9 0V6h7v12h-7zM6 8h3v2H6V8zm0 4h3v2H6v-2zm5-4h3v2h-3V8zm0 4h3v2h-3v-2z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-ev-purple">Menu</span>
                </div>
                <button onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 p-2 -mr-2 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-5">
                <a href="{{ route('home') }}" class="flex items-center gap-3 py-3 text-gray-700 hover:text-ev-purple font-medium rounded-xl hover:bg-ev-purple-50 px-3 transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Início
                </a>
                <a href="{{ route('books.index') }}" class="flex items-center gap-3 py-3 text-gray-700 hover:text-ev-purple font-medium rounded-xl hover:bg-ev-purple-50 px-3 transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Acervo completo
                </a>
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('books.create') }}" class="flex items-center gap-3 py-3 text-gray-700 hover:text-ev-purple font-medium rounded-xl hover:bg-ev-purple-50 px-3 transition-colors">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Cadastrar livro
                        </a>
                    @endif
                    <div class="border-t border-gray-100 mt-3 pt-3 px-3">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-ev-purple to-ev-purple-light rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-400">{{ auth()->user()->isAdmin() ? 'Administrador' : 'Usuário' }}</p>
                            </div>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 text-sm text-red-600 hover:text-red-700 font-medium py-2.5 px-3 rounded-xl hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Sair
                            </button>
                        </form>
                    </div>
                @else
                    <div class="border-t border-gray-100 mt-3 pt-3 px-3">
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 bg-ev-purple text-white font-semibold py-3 px-4 rounded-xl shadow-glass hover:shadow-glass-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Entrar
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if (session('status'))
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 mt-4 animate-slide-up">
            <div class="bg-emerald-50 border border-emerald-200 rounded-2xl px-5 py-4 text-sm text-emerald-800 flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 mt-4 animate-slide-up">
            <div class="bg-red-50 border border-red-200 rounded-2xl px-5 py-4 text-sm text-red-800">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    </div>
                    <span class="font-semibold">Ocorreu um erro</span>
                </div>
                <ul class="list-disc list-inside ml-11 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
                {{-- About --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-2.5 mb-5">
                        <div class="w-10 h-10 bg-gradient-to-br from-ev-purple to-ev-purple-dark rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM4 18V6h7v12H4zm9 0V6h7v12h-7zM6 8h3v2H6V8zm0 4h3v2H6v-2zm5-4h3v2h-3V8zm0 4h3v2h-3v-2z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">Livraria Virtual</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Compre livros novos, seminovos e usados pelos menores preços. Milhares de livros à sua disposição!
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-ev-purple transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-ev-purple transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-ev-purple transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Links --}}
                <div>
                    <h3 class="font-semibold mb-5 text-white">Links Úteis</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Início</a></li>
                        <li><a href="{{ route('books.index') }}" class="hover:text-white transition-colors">Acervo</a></li>
                        @auth
                            @if (auth()->user()->isAdmin())
                                <li><a href="{{ route('books.create') }}" class="hover:text-white transition-colors">Cadastrar livro</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>

                {{-- Categories --}}
                <div>
                    <h3 class="font-semibold mb-5 text-white">Categorias</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('books.index') }}" class="hover:text-white transition-colors">Acervo completo</a></li>
                    </ul>
                </div>

                {{-- Newsletter --}}
                <div>
                    <h3 class="font-semibold mb-5 text-white">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">Receba novidades e ofertas exclusivas.</p>
                    <form class="flex gap-2">
                        <input type="email" placeholder="Seu e-mail" class="flex-1 bg-gray-800 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-ev-purple transition-colors">
                        <button type="submit" class="bg-ev-purple text-white px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-ev-purple-dark transition-colors">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800">
            <div class="max-w-[1280px] mx-auto px-4 sm:px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} Livraria Virtual. Todos os direitos reservados.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-white transition-colors">Termos de Uso</a>
                    <a href="#" class="hover:text-white transition-colors">Privacidade</a>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
