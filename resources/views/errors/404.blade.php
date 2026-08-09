@extends('errors.layout')

@section('title', 'Página não encontrada')

@section('content')
    <div class="w-20 h-20 bg-ev-purple/10 rounded-full flex items-center justify-center mx-auto mb-6">
        <span class="text-4xl font-bold text-ev-purple">404</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Página não encontrada</h1>
    <p class="text-gray-600 text-sm leading-relaxed">
        O endereço que você procura não existe ou foi movido para outro local.
    </p>
@endsection
