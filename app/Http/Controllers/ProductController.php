<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para listar todos os produtos
    public function index()
    {
        $products = Product::all();  // Obtém todos os produtos do banco de dados
        return view('products.index', compact('products'));  // Retorna a visão com os produtos
    }

    public function edit($id)
{
    // Busca o produto pelo ID
    $product = Product::findOrFail($id);

    // Retorna a view com os dados do produto
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    // Validação dos dados recebidos
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    // Busca o produto pelo ID
    $product = Product::findOrFail($id);

    // Atualiza os dados do produto
     $product->update([
        'name' =>  $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    // Redireciona para a página de listagem de produtos com uma mensagem de sucesso
    return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
}

// Método para exibir o formulário de criação de produto
public function create()
{
    return view('products.create'); // Retorna a view de criação
}

// Método para armazenar o novo produto no banco de dados
public function store(Request $request)
{
    // Validação dos dados recebidos
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    // Criação do produto no banco de dados
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    // Redirecionando com mensagem de sucesso
    return to_route('produtos.index');
}
public function destroy($id)
{
    // Encontrar o produto pelo ID
    $produto = Product::findOrFail($id);

    // Excluir o produto
    $produto->delete();

    // Redirecionar para a página de listagem de produtos
    return to_route('produtos.index')->with('success', 'Produto excluído com sucesso!');
}}
