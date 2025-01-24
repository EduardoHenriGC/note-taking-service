@extends('admin.layouts.app')

@section('title', 'Criação de novas tags')

@section('content')


<div class="flex">
@include('layouts.sidebar')

<div class="flex-1 p-6 bg-gray-100">
@php
            $breadcrumbs = [
                ['label' => 'Home', 'url' => route('dashboard')],
                ['label' => 'Marcadores', 'url' => route('tags.index')],
                ['label' => 'Criar Marcadores', 'url' => route('tags.create')],
                
              
            ];
        @endphp
        @include('admin.users.partials.breadcrumb')
    <div class="container ">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">Criar Novo Marcador</h2>

        <!-- Formulário para criar a tag -->
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome da Tag</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>

    </div>

</div>

@endsection

