@extends('errors.layout')

@section('title', 'Acesso negado')

@section('content')
    <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <svg class="w-10 h-10 text-ev-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
        </svg>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Acesso negado</h1>
    <p class="text-gray-600 text-sm leading-relaxed">
        Você não tem permissão para acessar esta página.
    </p>
@endsection
