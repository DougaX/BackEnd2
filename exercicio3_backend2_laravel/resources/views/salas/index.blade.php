<h1>Lista de Salas</h1>
<ul>
@foreach ($salas as $sala)
    <li>
        <a href="{{ route('salas.show', $sala->id) }}">
            {{ $sala->nome }} - Capacidade: {{ $sala->capacidade }}
        </a>
    </li>
@endforeach
</ul>
