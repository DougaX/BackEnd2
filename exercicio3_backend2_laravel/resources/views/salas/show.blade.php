<h1>{{ $sala->nome }}</h1>
<p>Capacidade: {{ $sala->capacidade }}</p>
<p>Localização: {{ $sala->localizacao }}</p>
<a href="{{ route('salas.index') }}">Voltar</a>