<!DOCTYPE html>
<html>
<head>
    <title>Criar Professor</title>
</head>
<body>
    <h1>Criar Novo Professor</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('professores.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <div>
            <label>Departamento:</label>
            <input type="text" name="departamento" value="{{ old('departamento') }}" required>
        </div>
        
        <br>
        <button type="submit">💾 Salvar</button>
        <a href="{{ route('professores.index') }}">❌ Cancelar</a>
    </form>
</body>
</html>