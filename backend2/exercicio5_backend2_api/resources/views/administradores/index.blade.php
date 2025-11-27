<!DOCTYPE html>
<html>
<head>
    <title>Lista de Administradores</title>
</head>
<body>
    <h1>Lista de Administradores</h1>
    
    <a href="{{ route('administradores.create') }}">➕ Adicionar Novo Administrador</a>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <ul>
    @foreach ($administradores as $administrador)
        <li>
            <a href="{{ route('administradores.show', $administrador->id) }}">
                {{ $administrador->nome }} - Email: {{ $administrador->email }}
            </a>
        </li>
    @endforeach
    </ul>
</body>
</html>