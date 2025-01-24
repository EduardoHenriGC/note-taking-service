<!-- resources/views/layouts/sidebar.blade.php -->
<div class="sidebar bg-gray-800 text-white min-h-screen p-4 w-64">
    <h4 class="text-center font-bold mb-4">Menu</h4>
    <ul class="space-y-2">
        <li>
            <a  href="{{ route('notes.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                Todas as Notas
            </a>
        </li>
        <li>
            <a href="{{ route('notes.create') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                Criar Nota
            </a>
        </li>
       
        <li>
            <a href="{{ route('tags.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                Marcadores
            </a>
        </li>
    </ul>
</div>
