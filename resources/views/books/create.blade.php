@extends('layouts.home')

@section('title', 'Cadastrar livro')

@section('content')
    <div class="max-w-[1200px] mx-auto px-4 py-8">
        <div class="mb-4">
            <a href="{{ route('books.index') }}" class="text-ev-purple hover:text-ev-purple-dark text-sm font-medium flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Voltar para o acervo
            </a>
        </div>

        <div class="max-w-2xl mx-auto bg-white shadow-sm rounded-lg p-6 md:p-8">
            <h1 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Cadastrar livro</h1>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="space-y-5">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition @error('title') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">
                        @error('title')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Autor</label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}" required
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition @error('author') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">
                        @error('author')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">ISBN</label>
                        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" required
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition font-mono @error('isbn') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">
                        @error('isbn')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">Data de publicação</label>
                        <input type="date" name="published_at" id="published_at" value="{{ old('published_at') }}"
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition @error('published_at') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">
                        @error('published_at')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition @error('description') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <a href="{{ route('books.index') }}" class="text-sm text-gray-600 hover:text-gray-800 font-medium">Cancelar</a>
                        <button type="submit" class="bg-ev-purple text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-ev-purple-dark transition">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
