@extends('errors.layout')

@section('title', 'Erro no servidor')

@section('content')
    <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <span class="text-4xl font-bold text-ev-red">500</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Erro no servidor</h1>
    <p class="text-gray-600 text-sm leading-relaxed">
        Algo deu errado do nosso lado. Por favor, tente novamente mais tarde.
    </p>
@endsection
