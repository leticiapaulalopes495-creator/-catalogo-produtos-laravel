
@extends('layouts.app')

@section('title', 'Editar Produto #' . $product->id)

@section('content')

    <h1>Editar Produto #{{ $product->id }}</h1>

    <a href="{{ route('products.index') }}">
        Voltar
    </a>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label for="name">
            Nome do Produto *
        </label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $product->name) }}"
        >

        @error('name')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label for="category_id">
            Categoria *
        </label>

        <select name="category_id" id="category_id">

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach

        </select>

        @error('category_id')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label for="price">
            Preço (R$) *
        </label>

        <input
            type="number"
            name="price"
            id="price"
            value="{{ old('price', $product->price) }}"
        >

        @error('price')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label for="stock">
            Estoque *
        </label>

        <input
            type="number"
            name="stock"
            id="stock"
            value="{{ old('stock', $product->stock) }}"
        >

        @error('stock')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label for="image">
            Substituir Imagem (Opcional)
        </label>

        @if($product->image)

            <div>
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="Imagem Atual"
                >

                <p>
                    Imagem cadastrada atualmente.
                    Selecione um novo arquivo abaixo caso deseje substituí-la.
                </p>
            </div>

        @endif

        <p>
            Formatos aceitos: JPG, PNG, WEBP (Máx: 2MB).
        </p>

        <input
            type="file"
            name="image"
            id="image"
        >

        @error('image')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label for="description">
            Descrição *
        </label>

        <textarea
            name="description"
            id="description"
        >{{ old('description', $product->description) }}</textarea>

        @error('description')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label>
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $product->is_active) ? 'checked' : '' }}
            >
            Produto Ativo para Venda
        </label>

        <a href="{{ route('products.index') }}">
            Cancelar
        </a>

        <button type="submit">
            Salvar Alterações
        </button>

    </form>

@endsection

