<h3>Clientes</h3>
<a href="{{ route('clientes.create') }}"> Novo cliente</a>
<ul>
    @foreach ($clientes as $cli)
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
