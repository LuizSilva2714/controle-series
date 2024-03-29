<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-3">Adicionar</a>
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('seasons.index', $serie) }}">{{ $serie->nome }}</a>
        <form action="{{ route('series.destroy', $serie->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                X
            </button>
            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-outline-secondary mb-3">Editar</a>
        </form>
    </li>
    @endforeach
    <script>
        const series = {{Js::from($series)}};
    </script>
</ul>
</x-layout>

