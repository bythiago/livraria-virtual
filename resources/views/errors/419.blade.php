@extends('errors.layout')

@section('title', 'Sessão expirada')

@section('content')
    <div class="w-20 h-20 bg-ev-orange/10 rounded-full flex items-center justify-center mx-auto mb-6">
        <span class="text-4xl font-bold text-ev-orange">419</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Sessão expirada</h1>
    <p class="text-gray-600 text-sm leading-relaxed">
        Sua sessão expirou por segurança. Por favor, faça login novamente para continuar.
    </p>
@endsection
