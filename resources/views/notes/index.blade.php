@extends('admin.layouts.app')

@section('title', 'Listagem de Notas')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Conteúdo principal -->
    <div class="flex-1 p-6 bg-gray-100">
    @php
    if (Route::currentRouteName() === 'tags.notes') {

        // Verificar se a variável $tag não é null
        if ($tag) {
            // Breadcrumbs para a rota tags.notes
            $breadcrumbs = [
                ['label' => 'Home', 'url' => route('dashboard')],
                ['label' => 'Marcadores', 'url' => route('tags.index')],
                ['label' => $tag->name, 'url' => route('tags.notes', ['tagId' => $tag->id])],
            ];
        } else {
            // Caso não exista uma tag, podemos redirecionar ou exibir um erro
            // Por enquanto, vamos apenas definir o breadcrumbs sem a tag
            $breadcrumbs = [
                ['label' => 'Home', 'url' => route('dashboard')],
                ['label' => 'Marcadores', 'url' => route('tags.index')],
                
            ];
        }

    } else {

        // Breadcrumbs padrão
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Notes', 'url' => route('notes.index')],
        ];

    }
@endphp


        @include('admin.users.partials.breadcrumb')

        @foreach ($notes as $note)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h2 class="text-xl font-semibold">{{ Str::limit($note->content, 50) }}</h2>

                <!-- Exibir os arquivos -->
                <div class="mt-2">
                    @foreach ($note->files as $file)
                        <div>
                            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">
                                {{ basename($file->file_path) }} <!-- Nome do arquivo -->
                            </a>
                        </div>
                    @endforeach
                </div>

                @if(isset($isTagRoute) && $isTagRoute)
        <!-- Botão para associar a nota a um marcador -->
        <form action="{{ route('tags.notes.remove', ['tagId' => $tag->id, 'noteId' => $note->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desassociar esta nota do marcador?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger">Remover do Marcador</button>
</form>
    @else
         <!-- Botão para associar a nota a um marcador -->
         <div class="mt-4">
                    <a href="{{ route('notes.addTagForm', ['noteId' => $note->id]) }}" class="btn btn-primary">
                        Adicionar ao Marcador
                    </a>
                </div>
    @endif

            </div>
        @endforeach
    </div>
</div>
@endsection



