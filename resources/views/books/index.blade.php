@extends('layouts.home')

@section('title', 'Acervo de Livros')

@section('content')
    <div class="max-w-[1200px] mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Acervo de Livros</h1>
            @auth
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('books.create') }}" class="bg-ev-orange text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-ev-orange-dark transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Novo livro
                    </a>
                @endif
            @endauth
        </div>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISBN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publicação</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($books as $book)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $book->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-mono">{{ $book->isbn }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $book->published_at?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-3">
                                <a href="{{ route('books.show', $book) }}" class="text-ev-purple hover:text-ev-purple-dark font-medium">Ver</a>
                                @auth
                                    @if (auth()->user()->isAdmin())
                                        <a href="{{ route('books.edit', $book) }}" class="text-ev-orange hover:text-ev-orange-dark font-medium">Editar</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Excluir este livro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Excluir</button>
                                        </form>
                                    @endif
                                @endauth
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                <p class="text-gray-500">Nenhum livro cadastrado.</p>
                                @auth
                                    @if (auth()->user()->isAdmin())
                                        <a href="{{ route('books.create') }}" class="inline-block mt-3 text-ev-purple hover:text-ev-purple-dark font-medium text-sm">Cadastrar primeiro livro</a>
                                    @endif
                                @endauth
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection
