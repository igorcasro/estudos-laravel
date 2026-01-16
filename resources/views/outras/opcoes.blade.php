@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')
    <div class="options">
        <ul>
            <li><a class="warning {{ request()->is('opcoes/1') ? 'selected' : '' }}"
                    href="{{ route('opcoes', 1) }}">warning</a></li>
            <li><a class="info {{ request()->is('opcoes/2') ? 'selected' : '' }}" href="{{ route('opcoes', 2) }}">info</a>
            </li>
            <li><a class="success {{ request()->is('opcoes/3') ? 'selected' : '' }}"
                    href="{{ route('opcoes', 3) }}">success</a></li>
            <li><a class="error {{ request()->is('opcoes/4') ? 'selected' : '' }}" href="{{ route('opcoes', 4) }}">error</a>
            </li>
        </ul>
    </div>

    @if (@isset($opcao))

        @switch($opcao)
            @case(1)
                <x-alerta titulo="Atenção" tipo="warning">
                    <p><strong>Erro inesperado</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
            @break

            @case(2)
                <x-alerta titulo="Info" tipo="info">
                    <p><strong>Erro inesperado</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
            @break

            @case(3)
                <x-alerta titulo="Sucesso" tipo="success">
                    <p><strong>Erro inesperado</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
            @break

            @case(4)
                <x-alerta titulo="Erro" tipo="error">
                    <p><strong>Erro inesperado</strong></p>
                    <p>Ocorreu um erro inesperado</p>
                </x-alerta>
            @break

            @default
        @endswitch

    @endisset

@endsection
