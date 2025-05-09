<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">CS</span> <span class="text-white">CeramicSoft</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="material-icons">menu</i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="btn1"><a href="{{route('dashboard')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i>Painel</a></li>
                <li class="btn2"><a href="{{route('funcionarios')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i>
                        Funcionários</a></li>
                <li class="btn3"><a href="{{route('producao')}}" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                        <span><i class="fal fa-comment"></i> Produção</span>
                    </a>
                </li>
                <li class="btn5"><a href="{{route('folhaPagamento.index')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                        Folha de pagamento</a></li>
                <li class="btn6"><a href="{{route('estoque')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                        Estoque</a>
                </li>
                <li class="btn7"><a href="{{route('cliente')}}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                        Clientes</a>
                </li>
            </ul>
            <hr class="h-color mx-2">

        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="nav container-fluid p-0 justify-content-end">
                    <div class="d-flex d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="material-icons">menu</i></button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Configurações
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{route('logout')}}" method="post" onsubmit="confirmarSaida()">
                                    @csrf
                                    <button type="submit" class="dropdown-item">sair</button>
                                </form>
                            </li>
                    </div>
            </nav>

            @yield('content')

            <script>
                var sidebar = document.getElementById("side_nav");
                window.addEventListener("scroll", function() {
                    sidebar.style.top = window.pageYOffset + "px";
                });

                function removeClassOnSmallScreen() {
                    const screenWidth = window.innerWidth;
                    const element = document.querySelector('.nav');

                    if (screenWidth < 768) {
                        element.classList.remove('justify-content-end');
                    } else {
                        element.classList.add('justify-content-end');
                    }
                }
                window.addEventListener('load', removeClassOnSmallScreen);
                window.addEventListener('resize', removeClassOnSmallScreen);

                function confirmarSaida() {
                    return confirm("Tem certeza de que quer sair da conta?");
                }
            </script>
</body>

</html>