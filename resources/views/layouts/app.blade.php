<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'TechStore - Catálogo de Produtos')</title>

    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        #wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        #sidebar-wrapper {
            width: 260px;
            background-color: #1e293b;
            color: #fff;
            flex-shrink: 0;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.25rem 1.5rem;
            font-size: 1.2rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background-color: #0f172a;
        }

        #sidebar-wrapper .list-group {
            width: 100%;
        }

        #sidebar-wrapper .list-group-item {
            border: none;
            padding: 0.85rem 1.5rem;
            background-color: transparent;
            color: #94a3b8;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s;
        }

        #sidebar-wrapper .list-group-item:hover,
        #sidebar-wrapper .list-group-item.active {
            color: #fff;
            background-color: #2563eb;
            font-weight: 500;
        }

        #page-content-wrapper {
            flex-grow: 1;
            overflow-x: hidden;
        }

        .top-navbar {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.8rem 1.5rem;
        }

        .product-img-thumb {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar / Menu Lateral -->
        <aside id="sidebar-wrapper">

            <div class="sidebar-heading text-primary">
                <i class="bi bi-shop me-2"></i>TechStore
            </div>

            <div class="list-group list-group-flush mt-3">

                <a
                    href="{{ route('products.index') }}"
                    class="list-group-item list-group-item-action {{ request()->routeIs('products.index') ? 'active' : '' }}"
                >
                    <i class="bi bi-box-seam-fill"></i>
                    Catálogo de Produtos
                </a>

                <a
                    href="{{ route('products.create') }}"
                    class="list-group-item list-group-item-action {{ request()->routeIs('products.create') ? 'active' : '' }}"
                >
                    <i class="bi bi-plus-circle-fill"></i>
                    Cadastrar Produto
                </a>

            </div>

            <div class="p-3 mt-auto text-muted small position-absolute bottom-0">
                <hr class="border-secondary mb-2">
                <span>Catálogo v1.0 &bull; SENAI</span>
            </div>

        </aside>

        <!-- Área de Conteúdo Principal -->
        <div id="page-content-wrapper">

            <!-- Navbar Superior -->
            <header class="top-navbar d-flex justify-content-between align-items-center">

                <span class="fw-semibold text-secondary">
                    <i class="bi bi-grid-3x3-gap me-1"></i>
                    Gestão de Produtos e Estoque
                </span>

                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-dark border px-3 py-2">
                        <i class="bi bi-person-circle me-1"></i>
                        Administrador
                    </span>
                </div>

            </header>

            <!-- Conteúdo Injetado das Views Filhas -->
            <main class="container-fluid p-4">

                <!-- Mensagens Flash de Sucesso -->
                @if(session('success'))
                    <div
                        class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4"
                        role="alert"
                    >
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        ></button>
                    </div>
                @endif

                @yield('content')

            </main>

        </div>

    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>