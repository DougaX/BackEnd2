<h1>Lista de Administradores</h1>
<ul>
@foreach ($administradores as $administrador)
    <li>
        <a href="{{ route('administradores.show', $administrador->id) }}">
            {{ $administrador->nome }} - Email: {{ $administrador->email }}
        </a>
    </li>
@endforeach
</ul>