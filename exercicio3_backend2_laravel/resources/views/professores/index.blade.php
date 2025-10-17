<h1>Lista de Professores</h1>
<ul>
@foreach ($professores as $professor)
    <li>
        <a href="{{ route('professores.show', $professor->id) }}">
            {{ $professor->nome }} - {{ $professor->departamento }}
        </a>
    </li>
@endforeach
</ul>