@extends('layouts.app')

@section('title', 'Catálogo de Produtos - TechStore')

@section('content')

    <h1>Catálogo de Produtos</h1>

    <p>
        Consulte, filtre e gerencie os itens
        disponíveis no estoque.
    </p>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Novo Produto
        </a>

        <form method="GET" action="{{ route('products.index') }}" class="d-flex gap-2">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Buscar produto..."
                value="{{ request('search') }}"
            >

            <select name="category_id" class="form-select">
                <option value="">Todas as Categorias</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-search me-1"></i>
                Filtrar
            </button>

        </form>

    </div>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)

                <tr>
                    <td>
                        @if($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                            >
                        @else
                        @endif
                    </td>

                    <td>
                        {{ $product->name }}
                        #{{ $product->id }}
                    </td>

                    <td>
                        {{ $product->category->name ?? 'Sem Categoria' }}
                    </td>

                    <td>
                        R$ {{ number_format($product->price, 2, ',', '.') }}
                    </td>

                    <td>
                        @if($product->stock > 10)
                            {{ $product->stock }} un.
                        @elseif($product->stock > 0)
                            {{ $product->stock }} un.
                        @else
                            Esgotado
                        @endif
                    </td>

                    <td>
                        @if($product->is_active)
                            Ativo
                        @else
                            Inativo
                        @endif
                    </td>

                    <td>
                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="7">
                        Nenhum produto encontrado para os filtros selecionados.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

    @if($products->hasPages())
        {{ $products->links() }}
    @endif

@endsection