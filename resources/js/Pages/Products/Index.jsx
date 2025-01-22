import { Link } from '@inertiajs/react';
import React from 'react';
import { Inertia } from '@inertiajs/inertia';

const Index = ({ products }) => {
    // Função para excluir um produto
    const handleDelete = (productId) => {
        if (window.confirm('Tem certeza que deseja excluir este produto?')) {
            Inertia.delete(`/produtos/${productId}`);
        }
    };

    return (
        <div className="container mt-4">
            <h1 className="text-center mb-4">Produtos</h1>

            {/* Tabela de produtos */}
            <table className="table table-bordered table-striped">
                <thead className="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {products.map((product) => (
                        <tr key={product.id}>
                            <td>{product.id}</td>
                            <td>{product.name}</td>
                            <td>{product.price}</td>
                            <td>{product.description}</td>
                            <td>
                                {/* Botão de Editar */}
                                <a href={`/produtos/${product.id}/editar`} className="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                {/* Botão de Excluir */}
                                <button
                                    className="btn btn-danger btn-sm ms-2"
                                    onClick={() => handleDelete(product.id)}
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>

            {/* Botão para criar um novo produto */}
            <div className="mb-3">
                <Link href="/produtos/criar" className="btn btn-primary">
                    Criar Novo Produto
                </Link>
            </div>
        </div>
    );
};

export default Index;
