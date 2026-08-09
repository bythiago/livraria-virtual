@extends('errors.layout')

@section('title', 'Erro de validação')

@section('content')
    <div class="w-20 h-20 bg-ev-orange/10 rounded-full flex items-center justify-center mx-auto mb-6">
        <span class="text-4xl font-bold text-ev-orange">422</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Dados inválidos</h1>
    <p class="text-gray-600 text-sm leading-relaxed">
        Os dados enviados não são válidos. Por favor, verifique o formulário e tente novamente.
    </p>
@endsection
