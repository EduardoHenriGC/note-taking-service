<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    // Método para listar todos os produtos
    public function getAll()
    {
        return Product::all();
    }

    // Método para encontrar um produto pelo ID
    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    // Método para criar um novo produto
    public function create($data)
    {
        return Product::create($data);
    }

    // Método para atualizar o produto
    public function update($id, $data)
    {
        $product = $this->findById($id);
        $product->update($data);
        return $product;
    }

    // Método para deletar um produto
    public function delete($id)
    {
        $product = $this->findById($id);
        $product->delete();
    }
}
