<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/form  ')}}">
</head>

<body>
    @extends('layouts/navigation')
    @section('content')
    <div class="dashboard-content px-3 pt-4">
        <div class="fs-4 m-2 mt-1 d-flex justify-content-between flex-column">
            <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
                <h2>Adicionar funcionários</h2>
            </div>

            <div class="form-container">
                <form action="{{route('')}}" method="POST">
                    <label for="nome">Nome</label>
                    <input type="text" id="name" name="name" required>
                    <label for="nome">Ganho por milheiro</label>
                    <input type="text" id="ganhoMilheiro" name="ganhoMilheiro" required>
                    <button type="submit">Adicionar</button>
                </form>
            </div>
        </div>

    </div>

    </div>
    <script>
        const local = "funcionarios";
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
            const local = "funcionarios";
            const element = document.querySelector('.btn2');
            if (local === "funcionarios") {
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