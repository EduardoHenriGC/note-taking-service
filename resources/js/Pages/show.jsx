import React from 'react';
import { Inertia } from '@inertiajs/inertia';

const UserDetail = ({ user }) => {
  const handleDelete = () => {
    if (confirm('Tem certeza que deseja deletar este usuário?')) {
      Inertia.delete(route('users.destroy', user.id));
    }
  };

  return (
    <div>
      <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
        Detalhes do Usuário bro {user.name}
      </h2>
      
      <ul className="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
        <li>Nome: {user.name}</li>
        <li>E-mail: {user.email}</li>
      </ul>
      
      <div className="alert">
        {/* Implement your custom alert component here */}
      </div>
      
      {user.canDelete && (
        <button
          onClick={handleDelete}
          className="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
        >
          Deletar
        </button>
      )}
    </div>
  );
};

export default UserDetail;
