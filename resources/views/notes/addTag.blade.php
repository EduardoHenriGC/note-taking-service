@extends('admin.layouts.app')

@section('title', 'Adicionar Marcador à Nota')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Conteúdo principal -->
    <div class="flex-1 p-6 bg-gray-100">
        @php
            $breadcrumbs = [
                ['label' => 'Home', 'url' => route('dashboard')],
                ['label' => 'Tags', 'url' => route('tags.index')],
                ['label' => 'Adicionar Marcador à Nota', 'url' => route('notes.addTagForm', ['noteId' => $note->id])],
            ];
        @endphp

        @include('admin.users.partials.breadcrumb')
<div class="container">
    <h1 class="mb-4">Adicionar Marcador à Nota: {{ Str::limit($note->content, 50) }}</h1>

    <form action="{{ route('notes.addTagToNote', ['noteId' => $note->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tag_id" class="form-label">Selecione o Marcador</label>
            <select name="tag_id" id="tag_id" class="form-control" required>
                <option value="">Selecione uma tag...</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Associar Marcador</button>
    </form>
</div>
</div>
        </div>
@endsection
