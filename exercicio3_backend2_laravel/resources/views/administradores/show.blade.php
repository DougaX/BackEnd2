<!DOCTYPE html>
<html>
<head>
    <title>{{ $administrador->nome }}</title>
</head>
<body>
    <h1>{{ $administrador->nome }}</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <p><strong>Email:</strong> {{ $administrador->email }}</p>
    
    <hr>
    
    <a href="{{ route('administradores.index') }}">⬅️ Voltar</a> |
    <a href="{{ route('administradores.edit', $administrador->id) }}">✏️ Editar</a> |
    
    <form action="{{ route('administradores.destroy', $administrador->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar?')" style="color: red;">
            🗑️ Deletar
        </button>
    </form>
</body>
</html>