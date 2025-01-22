<!-- resources/views/products/index.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>

    <!-- Adicionando o link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Produtos</h1>

        @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    
        <script>
            // Função para esconder o alerta após 5 segundos
            setTimeout(function() {
                var alertElement = document.getElementById('success-alert');
                if (alertElement) {
                    alertElement.style.display = 'none';
                }
            }, 5000); // 5000 milissegundos = 5 segundos
        </script>
    @endif

        <!-- Tabela de Produtos -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                        <!-- Botão de Editar -->
                        <a href="{{ route('produtos.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <!-- Botão de Deletar -->
                        <form action="{{ route('produtos.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="text-center mt-4">
            <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Novo Produto</a>
        </div>
    </div>

    <!-- Adicionando o script do Bootstrap (necessário para alguns componentes interativos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
