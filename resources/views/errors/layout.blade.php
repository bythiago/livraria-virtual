<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Erro') - Livraria Virtual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ev: {
                            purple: '#5A2D82',
                            'purple-dark': '#4A2470',
                            'purple-light': '#7B4FA2',
                            orange: '#F5A623',
                            'orange-dark': '#E0950F',
                            green: '#27AE60',
                            red: '#E74C3C',
                            'gray-bg': '#F5F5F5',
                            'gray-light': '#E8E8E8',
                            'gray-text': '#666666',
                        }
                    },
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-ev-gray-bg text-gray-900 antialiased min-h-screen flex flex-col">
    <div class="bg-ev-purple text-white text-xs">
        <div class="max-w-[1200px] mx-auto px-4 flex items-center justify-between h-8">
            <p class="hidden sm:block">Compre aqui livros novos, usados e seminovos de milhares de sebos e livrarias.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:underline">Quero Vender</a>
                <a href="#" class="hover:underline">Painel do Livreiro</a>
                <a href="#" class="hover:underline">Central de ajuda</a>
            </div>
        </div>
    </div>

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-[1200px] mx-auto px-4 flex items-center gap-4 h-16">
            <a href="/" class="flex-shrink-0">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-ev-purple rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM4 18V6h7v12H4zm9 0V6h7v12h-7zM6 8h3v2H6V8zm0 4h3v2H6v-2zm5-4h3v2h-3V8zm0 4h3v2h-3v-2z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-ev-purple hidden sm:block">Livraria Virtual</span>
                </div>
            </a>
        </div>
    </header>

    <main class="flex-1">
        <div class="max-w-[1200px] mx-auto px-4 py-16">
            <div class="max-w-md mx-auto bg-white shadow-sm rounded-lg p-8 text-center">
                @yield('content')
                <a href="/" class="inline-block mt-6 bg-ev-purple text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-ev-purple-dark transition">
                    Voltar para o início
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-[1200px] mx-auto px-4 py-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-ev-purple rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM4 18V6h7v12H4zm9 0V6h7v12h-7zM6 8h3v2H6V8zm0 4h3v2H6v-2zm5-4h3v2h-3V8zm0 4h3v2h-3v-2z"/>
                            </svg>
                        </div>
                        <span class="text-lg font-bold">Livraria Virtual</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Compre livros novos, seminovos e usados pelos menores preços. Milhares de livros à sua disposição!
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">Links Úteis</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/" class="hover:text-white transition">Início</a></li>
                        <li><a href="/books" class="hover:text-white transition">Acervo</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">Categorias</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/books" class="hover:text-white transition">Acervo</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">Redes Sociais</h3>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-ev-purple transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-ev-purple transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-ev-purple transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700">
            <div class="max-w-[1200px] mx-auto px-4 py-4 text-center text-sm text-gray-400">
                &copy; {{ date('Y') }} Livraria Virtual. Todos os direitos reservados.
            </div>
        </div>
    </footer>
</body>
</html>
