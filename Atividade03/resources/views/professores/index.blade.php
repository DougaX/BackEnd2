<!DOCTYPE html>
<html>
<head>
    <title>Lista de Professores</title>
</head>
<body>
    <h1>Lista de Professores</h1>
    
    <a href="{{ route('professores.create') }}">➕ Adicionar Novo Professor</a>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <ul>
    @foreach ($professores as $professor)
        <li>
            <a href="{{ route('professores.show', $professor->id) }}">
                {{ $professor->nome }} - {{ $professor->departamento }}
            </a>
        </li>
    @endforeach
    </ul>
</body>
</html>