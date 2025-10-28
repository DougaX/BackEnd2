<!DOCTYPE html>
<html>
<head>
    <title>Criar Administrador</title>
</head>
<body>
    <h1>Criar Novo Administrador</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('administradores.store') }}" method="POST">
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
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>
        
        <br>
        <button type="submit">💾 Salvar</button>
        <a href="{{ route('administradores.index') }}">❌ Cancelar</a>
    </form>
</body>
</html>