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
                <h2>Adicionar cliente</h2>
            </div>

            <div class="container mt-5">
                <div class="form-container bg-light p-4 rounded shadow-sm">
                    <form action="{{ route('cliente.store') }}" method="get">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nome do funcionário</label>
                            <input id="name" name="name" class="form-control" required>
                            @error('name')
                            <small style="font-size: small;" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ganho" class="form-label">Ganho por milheiro</label>
                            <input type="number" id="ganho" name="ganhoMilheiro" class="form-control" max="200" required>
                            @error('ganhoMilheiro')
                            <small style="font-size: small;" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex flex-direction-row gap-3">
                            <a class="btn btn-secondary" href="{{route('funcionarios')}}">Voltar</a>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    </div>
    <script>
        const local = "cliente";
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

        const ganhoInput = document.getElementById('ganho');

        ganhoInput.addEventListener('input', function() {
            if (ganhoInput.value > 200) {
                ganhoInput.value = 200;
            }
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
            const local = "cliente";
            const element = document.querySelector('.btn7');
            if (local === "cliente") {
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