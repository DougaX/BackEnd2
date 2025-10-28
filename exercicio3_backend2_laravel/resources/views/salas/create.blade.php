<!DOCTYPE html>
<html>
<head>
    <title>Criar Sala</title>
</head>
<body>
    <h1>Criar Nova Sala</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('salas.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </div>
        
        <div>
            <label>Capacidade:</label>
            <input type="number" name="capacidade" value="{{ old('capacidade') }}" min="1" required>
        </div>
        
        <div>
            <label>Localização:</label>
            <input type="text" name="localizacao" value="{{ old('localizacao') }}" required>
        </div>
        
        <br>
        <button type="submit">💾 Salvar</button>
        <a href="{{ route('salas.index') }}">❌ Cancelar</a>
    </form>
</body>
</html>