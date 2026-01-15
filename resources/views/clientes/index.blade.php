@extends('layouts.principal')

@section('titulo', 'Clientes')

@section('conteudo')
    <h3>{{ $titulo }}</h3>
    <a href="{{ route('clientes.create') }}"> Novo cliente</a>

    @if (count($clientes) > 0)
        <ul>
            @foreach ($clientes as $cli)
                {{-- Aqui entra o nome do parâmetro repassado no controller da função --}}
                <li>
                    Id: {{ $cli['id'] }} | Nome: {{ $cli['nome'] }} |
                    <a href="{{ route('clientes.edit', $cli['id']) }}"> Editar cliente</a> |
                    <a href="{{ route('clientes.show', $cli['id']) }}"> Visualizar cliente</a> |
                    <form action="{{ route('clientes.destroy', $cli['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Apagar">
                    </form>
                </li>
            @endforeach
        </ul>

        {{-- Seção somente para maneiras distintas de recuperação de dados --}}
        {{-- <hr> --}}
        {{-- @for ($i = 0; $i < 10; $i++) --}}
        {{-- {{ $i }}, --}}
        {{-- @endfor --}}
        {{-- <br> --}}
        {{-- @for ($i = 0; $i < count($clientes); $i++) --}}
        {{-- {{ $clientes[$i]['nome'] }}, --}}
        {{-- @endfor --}}
        {{-- <br> --}}
        {{--  --}}
        {{--  --}}
        {{-- @foreach ($clientes as $cli) --}}
        {{-- <p> --}}
        {{-- {{ $cli['nome'] }} | --}}
        {{-- @if ($loop->first) --}}
        {{-- (primeiro) --}}
        {{-- | --}}
        {{-- @endif --}}
        {{-- @if ($loop->last) --}}
        {{-- (ultimo) --}}
        {{-- | --}}
        {{-- @endif --}}
        {{-- ({{ $loop->index }}) - {{ $loop->iteration }} / {{ $loop->count }} --}}
        {{-- </p> --}}
        {{-- @endforeach --}}
    @endif

    {{-- O código abaixo substitui a necessidade do else --}}
    {{-- @else --}}
    {{-- <h4>Não existem clientes cadastrados.</h4> --}}
    @empty($clientes)
        <h4>Não existem clientes cadastrados.</h4>
    @endempty
@endsection
