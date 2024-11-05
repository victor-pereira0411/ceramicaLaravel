<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/form')}}">
</head>

<body>
    @extends('layouts/navigation')
    @section('content')
    <div class="dashboard-content px-3 pt-4">
        <div class="fs-4 m-2 mt-1 d-flex justify-content-between flex-column">
            <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
                <h2>Adicionar produção</h2>
            </div>

            <div class="container mt-5">
                <div class="form-container bg-light p-4 rounded shadow-sm">
                    <form action="{{ route('producao.store') }}" method="get">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Data de Produção</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="produzidos" class="form-label">Milheiros Produzidos</label>
                            <input type="number" id="produzidos" name="producao" class="form-control" required>
                        </div>
                        <div class="d-flex flex-direction-row gap-3">
                        <a class="btn btn-secondary" href="{{route('producao')}}">Voltar</a>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    </div>
    <script>
        const local = "producao";
        $(".sidebar ul li").on("click", function() {
            $(".sidebar ul li.active").removeClass("active");
            $(this).addClass("active");
        });

        $(".open-btn").on("click", function() {
            $(".sidebar").addClass("active");
        });

        $(".close-btn").on("click", function() {
            $(".sidebar").removeClass("active");
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


        function removeClassOnSmallScreen() {
            const local = "producaos";
            const element = document.querySelector('.btn3');
            if (local === "producaos") {
                element.classList.add('active');
            } else {
                element.classList.remove('justify-content-end');
            }
        }
        window.addEventListener('load', removeClassOnSmallScreen);
        window.addEventListener('resize', removeClassOnSmallScreen);
    </script>
    @endsection
</body>

</html>