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
                <h2>Editar estoque</h2>
            </div>

            <div class="container mt-5">
                <div class="form-container bg-light p-4 rounded shadow-sm">
                    <form action="{{ route('estoque.update', ['id' => $estoque->id]) }}" method="get">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="tipo" class="form-label">Tipo de telha/tijolo</label>
                            <input type="text" id="tipo" name="tipo" class="form-control" value="{{$estoque->name}}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="milheiros" class="form-label">Milheiros disponíveis</label>
                            <input type="number" id="milheiros" name="milheiros" class="form-control" value="{{$estoque->estoqueMilheiros}}" required>
                            @error('milheiros')
                            <small style="font-size: small;" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="produzidos" class="form-label">Valor por milheiro</label>
                            <input type="number" id="produzidos" name="valor" class="form-control" value="{{$estoque->valorMilheiro}}" required>
                            @error('valor')
                            <small style="font-size: small;" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex flex-direction-row gap-3">
                        <a class="btn btn-secondary" href="{{route('estoque')}}">Voltar</a>
                        <button type="submit" class="btn btn-primary">Atualizar dados</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    </div>
    <script>
        const local = "estoque";
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
            const local = "estoque";
            const element = document.querySelector('.btn6');
            if (local === "estoque") {
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