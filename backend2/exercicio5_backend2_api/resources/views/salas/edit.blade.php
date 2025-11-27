<!DOCTYPE html>
<html>
<head>
    <title>Editar Sala</title>
</head>
<body>
    <h1>Editar Sala</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('salas.update', $sala->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $sala->nome) }}" required>
        </div>
        
        <div>
            <label>Capacidade:</label>
            <input type="number" name="capacidade" value="{{ old('capacidade', $sala->capacidade) }}" min="1" required>
        </div>
        
        <div>
            <label>Localização:</label>
            <input type="text" name="localizacao" value="{{ old('localizacao', $sala->localizacao) }}" required>
        </div>
        
        <br>
        <button type="submit">💾 Atualizar</button>
        <a href="{{ route('salas.show', $sala->id) }}">❌ Cancelar</a>
    </form>
</body>
</html>