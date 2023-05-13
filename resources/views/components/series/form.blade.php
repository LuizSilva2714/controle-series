<form action="{{ $action }}" method="post">
    @csrf
    @isset($update)
        @method('PUT')
    @endisset
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" @isset($nome) value="{{ $nome }}" @endisset>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
