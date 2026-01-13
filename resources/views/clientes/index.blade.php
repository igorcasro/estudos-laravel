@extends('layouts.principal')

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
    @endif

    {{-- O código abaixo substitui a necessidade do else --}}
    {{-- @else --}}
    {{-- <h4>Não existem clientes cadastrados.</h4> --}}
    @empty($clientes)
        <h4>Não existem clientes cadastrados.</h4>
    @endempty
@endsection
