<!DOCTYPE html>
<html>
<head>
    <title>{{ $sala->nome }}</title>
</head>
<body>
    <h1>{{ $sala->nome }}</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <p><strong>Capacidade:</strong> {{ $sala->capacidade }}</p>
    <p><strong>Localização:</strong> {{ $sala->localizacao }}</p>
    
    <hr>
    
    <a href="{{ route('salas.index') }}">⬅️ Voltar</a> |
    <a href="{{ route('salas.edit', $sala->id) }}">✏️ Editar</a> |
    
    <form action="{{ route('salas.destroy', $sala->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar?')" style="color: red;">
            🗑️ Deletar
        </button>
    </form>
</body>
</html>