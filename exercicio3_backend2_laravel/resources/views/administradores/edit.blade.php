<!DOCTYPE html>
<html>
<head>
    <title>Editar Administrador</title>
</head>
<body>
    <h1>Editar Administrador</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('administradores.update', $administrador->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $administrador->nome) }}" required>
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $administrador->email) }}" required>
        </div>
        
        <div>
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Deixe em branco para não alterar">
            <small>(Deixe em branco se não quiser alterar a senha)</small>
        </div>
        
        <br>
        <button type="submit">💾 Atualizar</button>
        <a href="{{ route('administradores.show', $administrador->id) }}">❌ Cancelar</a>
    </form>
</body>
</html>