<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    // Injeção de dependência do ProductRepository
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    // Método para listar todos os produtos
    public function index()
    {
        $products = $this->productRepository->getAll();  // Usando o repositório
        return view('products.index', compact('products'));
    }

    // Método para editar um produto
    public function edit($id)
    {
        $product = $this->productRepository->findById($id); // Usando o repositório
        return view('products.edit', compact('product'));
    }

    // Método para atualizar um produto
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $this->productRepository->update($id, [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Método para exibir o formulário de criação
    public function create()
    {
        return view('products.create');
    }

    // Método para armazenar um novo produto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $this->productRepository->create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return to_route('produtos.index');
    }

    // Método para excluir um produto
    public function destroy($id)
    {
        $this->productRepository->delete($id); // Usando o repositório
        return to_route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
