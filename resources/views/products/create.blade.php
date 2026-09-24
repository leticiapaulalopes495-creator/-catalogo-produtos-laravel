@extends('layouts.app')

@section('title', 'Cadastrar Produto - TechStore')

@section('content')

    <h1 class="mb-4">Cadastrar Novo Produto</h1>

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left me-1"></i>
        Voltar
    </a>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">
                    Nome do Produto *
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="category_id" class="form-label">
                    Categoria *
                </label>

                <select name="category_id" id="category_id" class="form-select">
                    <option value="">
                        Selecione a categoria...
                    </option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">
                    Preço (R$) *
                </label>

                <input
                    type="number"
                    name="price"
                    id="price"
                    class="form-control"
                    value="{{ old('price') }}"
                    step="0.01"
                >

                @error('price')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">
                    Estoque *
                </label>

                <input
                    type="number"
                    name="stock"
                    id="stock"
                    class="form-control"
                    value="{{ old('stock') }}"
                >

                @error('stock')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="image" class="form-label">
                    Imagem do Produto (Opcional)
                </label>

                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control"
                >

                <div class="form-text">
                    Formatos aceitos: JPG, PNG, WEBP (Máx: 2MB).
                </div>

                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="description" class="form-label">
                    Descrição Detalhada *
                </label>

                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    rows="5"
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-4">
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        value="1"
                        class="form-check-input"
                        {{ old('is_active', true) ? 'checked' : '' }}
                    >

                    <label for="is_active" class="form-check-label">
                        Produto Ativo para Venda
                    </label>
                </div>
            </div>

        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('products.index') }}"
                class="btn btn-secondary"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-check-lg me-1"></i>
                Salvar Produto
            </button>

        </div>

    </form>

@endsection