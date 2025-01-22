<!-- resources/views/products/edit.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>

    <!-- Exibe mensagens de sucesso ou erro -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('produtos.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Laravel utiliza o método PUT para atualizações -->

        <label for="name">Nome do Produto:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        <br>

        <label for="price">Preço:</label>
        <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        <br>

        <label for="description">Descrição:</label>
        <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
        <br>

        <button type="submit">Atualizar Produto</button>
    </form>

    <br>
    <a href="{{ route('produtos.index') }}">Voltar para a lista de produtos</a>
</body>
</html>
