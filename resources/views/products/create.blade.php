<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Produto</title>
</head>
<body>
    <h1>Criar Novo Produto</h1>

    <!-- Exibe mensagens de sucesso ou erro -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário de criação de produto -->
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <label for="name">Nome do Produto:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="price">Preço:</label>
        <input type="text" id="price" name="price" value="{{ old('price') }}" required>
        @error('price')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="description">Descrição:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
        <br>

        <button type="submit">Criar Produto</button>
    </form>

    <br>
    <a href="{{ route('produtos.index') }}">Voltar para a lista de produtos</a>
</body>
</html>
