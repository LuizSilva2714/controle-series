<x-layout title="Séries">
    <a href="/series/criar" class="btn btn-dark mb-3">Adicionar</a>
<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item">{{ $serie->nome }}</li>
    @endforeach
    <script>
        const series = {{Js::from($series)}};
    </script>
</ul>
</x-layout>

