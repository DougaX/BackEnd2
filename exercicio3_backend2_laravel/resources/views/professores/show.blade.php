<h1>{{ $professor->nome }}</h1>
<p>Email: {{ $professor->email }}</p>
<p>Departamento: {{ $professor->departamento }}</p>
<a href="{{ route('professores.index') }}">Voltar</a>
