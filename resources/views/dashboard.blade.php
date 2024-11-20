<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts/navigation')
    @section('content')
    <div class="dashboard-content px-3 pt-4">
        <div class="row d-flex justify-content-center gap-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title fs-4">Funcionários</h5>
                    <a href="/funcionarios" class="btn btn-primary">Veja mais</a>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <h5 class="card-title fs-4">Produção</h5>
                    </div>
                    <div>
                        <a href="/producao" class="btn btn-primary">Veja mais</a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <div>
                        <h5 class="card-title fs-4">Folha de pagamento</h5>
                    </div>
                    <div>
                        <a href="/folhapagamento" class="btn btn-primary">Veja mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="table-responsive m-4 d-flex flex-column justify-content-center align-items-center">
                <div>
                    <h5>Relatório das maiores produções</h5>
                </div>
                @if($producao)
                <table class="table table-bordered table-hover table-sm text-center">
                    <thead>
                        <th scope="col">Data de produção</th>
                        <th scope="col">Milheiros Produzidos</th>
                    </thead>
                    <tbody>
                        @foreach($producao as $p)
                        <tr scope="row">
                            <td>{{ date( 'd/m/Y' , strtotime($p->dataProducao))}}</td>
                            <td>{{$p->milheirosProduzidos}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

    <script>
        const local = "index";
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
            const local = "index";
            const element = document.querySelector('.btn1');
            if (local === "index") {
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