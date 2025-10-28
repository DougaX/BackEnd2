<!DOCTYPE html>
<html>
<head>
    <title>Editar Professor</title>
</head>
<body>
    <h1>Editar Professor</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('professores.update', $professor->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $professor->nome) }}" required>
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $professor->email) }}" required>
        </div>
        
        <div>
            <label>Departamento:</label>
            <input type="text" name="departamento" value="{{ old('departamento', $professor->departamento) }}" required>
        </div>
        
        <br>
        <button type="submit">💾 Atualizar</button>
        <a href="{{ route('professores.show', $professor->id) }}">❌ Cancelar</a>
    </form>
</body>
</html>