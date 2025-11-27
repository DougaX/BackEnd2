<!DOCTYPE html>
<html>
<head>
    <title>{{ $professor->nome }}</title>
</head>
<body>
    <h1>{{ $professor->nome }}</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <p><strong>Email:</strong> {{ $professor->email }}</p>
    <p><strong>Departamento:</strong> {{ $professor->departamento }}</p>
    
    <hr>
    
    <a href="{{ route('professores.index') }}">⬅️ Voltar</a> |
    <a href="{{ route('professores.edit', $professor->id) }}">✏️ Editar</a> |
    
    <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar?')" style="color: red;">
            🗑️ Deletar
        </button>
    </form>
</body>
</html>