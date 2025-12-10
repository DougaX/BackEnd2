<!DOCTYPE html>
<html>
<head>
    <title>Lista de Salas</title>
</head>
<body>
    <h1>Lista de Salas</h1>
    
    <a href="{{ route('salas.create') }}">➕ Adicionar Nova Sala</a>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <ul>
    @foreach ($salas as $sala)
        <li>
            <a href="{{ route('salas.show', $sala->id) }}">
                {{ $sala->nome }} - Capacidade: {{ $sala->capacidade }}
            </a>
        </li>
    @endforeach
    </ul>
</body>
</html>