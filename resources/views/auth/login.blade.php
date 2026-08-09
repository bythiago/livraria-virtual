@extends('layouts.home')

@section('title', 'Entrar')

@section('content')
    <div class="max-w-[1200px] mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white shadow-sm rounded-lg p-6 md:p-8">
            <h1 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 text-center">Entrar</h1>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition @error('email') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">
                        @error('email')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                        <input type="password" name="password" id="password" required
                            class="w-full border rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-ev-purple/20 transition @error('password') border-red-500 focus:border-red-500 @else border-gray-300 focus:border-ev-purple @enderror">
                        @error('password')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-ev-purple text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-ev-purple-dark transition">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
