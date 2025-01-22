import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';

const Create = ({ csrf_token }) => {
    const [name, setName] = useState('');
    const [price, setPrice] = useState('');
    const [description, setDescription] = useState('');
    const [errors, setErrors] = useState({});

    // Função para lidar com o envio do formulário
    const handleSubmit = (e) => {
        e.preventDefault();

        Inertia.post('/produtos', {
            _token: csrf_token,
            name,
            price,
            description,
        })
    };

    return (
        <div className="container mt-4">
            <h1>Criar Novo Produto</h1>

            {/* Exibe mensagens de sucesso ou erro */}
            {errors.success && <div style={{ color: 'green' }}>{errors.success}</div>}
            
            <form onSubmit={handleSubmit}>
                <div>
                    <label htmlFor="name">Nome do Produto:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                        required
                    />
                    {errors.name && <div style={{ color: 'red' }}>{errors.name}</div>}
                </div>

                <div>
                    <label htmlFor="price">Preço:</label>
                    <input
                        type="text"
                        id="price"
                        name="price"
                        value={price}
                        onChange={(e) => setPrice(e.target.value)}
                        required
                    />
                    {errors.price && <div style={{ color: 'red' }}>{errors.price}</div>}
                </div>

                <div>
                    <label htmlFor="description">Descrição:</label>
                    <textarea
                        id="description"
                        name="description"
                        value={description}
                        onChange={(e) => setDescription(e.target.value)}
                    />
                </div>

                <button type="submit">Criar Produto</button>
            </form>

            <br />
            <a href="/produtos">Voltar para a lista de produtos</a>
        </div>
    );
};

export default Create;
