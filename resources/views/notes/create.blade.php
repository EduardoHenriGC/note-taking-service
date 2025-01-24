@extends('admin.layouts.app')

@section('title', 'Criar Nova Nota')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Conteúdo principal -->
    <div class="flex-grow-1 p-4 bg-light">
        @php
            $breadcrumbs = [
                ['label' => 'Home', 'url' => route('dashboard')],
                ['label' => 'Notes', 'url' => route('notes.index')],
                ['label' => 'Criar Nota', 'url' => route('notes.create')],
            ];
        @endphp

        @include('admin.users.partials.breadcrumb')

        <div class="container">
            <div class="card shadow-sm ">
                <div class="card-header bg-primary text-black">
                    <h3 class="mb-0">Criar Nova Nota</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            
                            <textarea name="content" id="content" class="form-control" rows="5" placeholder="Digite o conteúdo da nota" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="files" class="form-label">Anexar Arquivos (Máximo de 5 arquivos)</label>
                            <input type="file" name="files[]" id="files" class="form-control" multiple>
                            
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Salvar Nota</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
