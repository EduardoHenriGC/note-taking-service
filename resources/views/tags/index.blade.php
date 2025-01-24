@extends('admin.layouts.app')

@section('title', 'Listagem de Marcadores')

@section('content')
<div class="d-flex">
    @include('layouts.sidebar')

    <div class="flex-grow-1 p-4 bg-light">
        @php
            $breadcrumbs = [
                ['label' => 'Home', 'url' => route('dashboard')],
                ['label' => 'Marcadores', 'url' => route('tags.index')],
            ];
        @endphp
        @include('admin.users.partials.breadcrumb')

        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Listagem de Marcadores</h5>
                </div>
                <div class="card-body">
                    @if($tags->isEmpty())
                        <p class="text-muted">Nenhum marcador encontrado. <a href="{{ route('tags.create') }}">Clique aqui</a> para criar um novo.</p>
                    @else
                        <ul class="list-group">
                            @foreach($tags as $tag)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('tags.notes', ['tagId' => $tag->id]) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ $tag->name }}
                                        </a>
                                        <p class="mb-0 text-muted">{{ $tag->notes->count() }} notas associadas</p>
                                    </div>
                                    <div class="d-flex">
                                        <!-- Botão para ver notas -->
                                        <a href="{{ route('tags.notes', ['tagId' => $tag->id]) }}" class="btn btn-sm btn-outline-primary me-2">
                                            Ver Notas
                                        </a>
                                        <!-- Botão para deletar -->
                                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este marcador?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="mt-4 text-end">
                        <a href="{{ route('tags.create') }}" class="btn btn-success">Criar Marcador</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
