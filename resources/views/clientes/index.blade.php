<h3>Clientes</h3>
<a href="{{ route('clientes.create') }}"> Novo cliente</a>
<ol>
    @foreach ($clientes as $cli)
        <li>
            {{ $cli['nome'] }} |
            <a href="{{ route('clientes.edit', $cli['id']) }}"> Editar cliente</a>
        </li>
    @endforeach
</ol>
