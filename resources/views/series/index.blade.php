<x-layout title="Séries">
    <a href="/series/criar">Adicionar</a>
<ul>
    @foreach ($series as $serie)
    <li>{{ $serie }}</li>
    @endforeach
    <script>
        const series = {{Js::from($series)}};
    </script>
</ul>
</x-layout>

