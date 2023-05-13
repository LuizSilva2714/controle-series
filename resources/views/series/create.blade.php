<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" autofocus>
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">N° Temporadas:</label>
                <input type="text" class="form-control" name="seasonsQty" id="seasonsQty" value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / temporada:</label>
                <input type="text" class="form-control" name="episodesPerSeason" id="episodesPerSeason" value="{{ old('episodesPerSeason') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>
