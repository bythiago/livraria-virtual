@extends('layouts.home')

@section('title', $book->title)

@section('content')
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 py-8 lg:py-12">
        {{-- Breadcrumb --}}
        <div class="mb-6 lg:mb-8">
            <a href="{{ route('books.index') }}" class="text-ev-purple hover:text-ev-purple-dark text-sm font-medium inline-flex items-center gap-2 px-4 py-2 rounded-xl hover:bg-ev-purple-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Voltar para o acervo
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-card overflow-hidden">
            <div class="md:flex">
                {{-- Cover --}}
                <div class="md:w-1/3 lg:w-1/4">
                    <div class="h-[350px] md:h-full min-h-[350px] book-cover-placeholder flex items-center justify-center p-8 lg:p-10 relative overflow-hidden" style="--cover-from: #7C3AED; --cover-to: #A78BFA;">
                        <div class="absolute inset-0 bg-gradient-to-br from-black/10 to-transparent"></div>
                        <div class="relative z-10 text-center">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM4 18V6h7v12H4zm9 0V6h7v12h-7zM6 8h3v2H6V8zm0 4h3v2H6v-2zm5-4h3v2h-3V8zm0 4h3v2h-3v-2z"/>
                                </svg>
                            </div>
                            <p class="text-white font-bold text-xl lg:text-2xl text-center leading-tight drop-shadow-lg">{{ $book->title }}</p>
                        </div>
                    </div>
                </div>

                {{-- Details --}}
                <div class="md:w-2/3 lg:w-3/4 p-6 lg:p-10">
                    <div class="flex flex-wrap items-start justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">{{ $book->title }}</h1>
                            <p class="text-lg text-ev-purple font-semibold">{{ $book->author }}</p>
                        </div>
                    </div>

                    {{-- Info Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 bg-ev-purple-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-ev-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                                </div>
                                <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider">ISBN</dt>
                            </div>
                            <dd class="text-gray-900 font-mono text-lg font-semibold">{{ $book->isbn }}</dd>
                        </div>
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 bg-ev-purple-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-ev-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Data de publicação</dt>
                            </div>
                            <dd class="text-gray-900 text-lg font-semibold">{{ $book->published_at?->format('d/m/Y') ?? '—' }}</dd>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if ($book->description)
                        <div class="mb-8">
                            <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                                Descrição
                            </h2>
                            <p class="text-gray-700 leading-relaxed text-base">{{ $book->description }}</p>
                        </div>
                    @endif

                    {{-- Actions --}}
                    @auth
                        @if (auth()->user()->isAdmin())
                            <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                                <a href="{{ route('books.edit', $book) }}" class="bg-gradient-to-r from-ev-orange to-ev-orange-dark text-white px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg transition-all inline-flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Editar
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Excluir este livro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gray-100 text-red-600 px-6 py-3 rounded-xl text-sm font-semibold hover:bg-red-50 hover:text-red-700 transition-colors inline-flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
