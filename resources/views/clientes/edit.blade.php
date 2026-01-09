<h3>Editar cliente</h3>

<form action="{{ route('clientes.update', $cliente['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nome anterior: {{ $cliente['nome'] }}</p>
    <input type="text" name="nome" value="{{ $cliente['nome'] }}">
    <input type="submit" value="Salvar">
</form>

<a href="{{ route('clientes.index') }}">Voltar</a>
