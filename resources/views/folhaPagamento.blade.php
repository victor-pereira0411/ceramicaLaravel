@extends('layouts/navigation')
@section('content')
<div class="dashboard-content px-3 pt-4">
    <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
        <h2>Folha de pagamento</h2>
        <form action="{{route('folhaPagamento.delete')}}" method="get" onsubmit="confirmarPagamento()">
            <input class="btn btn-secondary" type="submit" value="Finalizar pagamento">
        </form>
    </div>
    @if(session()->has('message'))
        <div class="container">
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                {{ session()->get('message') }} 
                <a href="{{route('folhaPagamento.index')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if(session()->has('messageWarning'))
        <div class="container">
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                {{ session()->get('messageWarning') }} 
                <a href="{{route('folhaPagamento.index')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if($folha)

    <div class="m-4 d-flex justify-content-center align-items-center">
        <div class="table-responsive w-100">
            <table class="table table-hover table-sm text-center fs-5">
                <thead>
                    <th scope="col">Nome do funcionário</th>
                    <th scope="col">Valor do milheiro</th>
                    <th scope="col">Milheiros Produzidos</th>
                    <th scope="col">Salário</th>
                </thead>
                <tbody>
                    @foreach ($folha as $fo)
                    <tr scope="row">
                        <td>{{ $fo->funcionario->name }}</td>
                        <td>{{ $fo->valorMilheiro }} reais</td>
                        <td>{{ $fo->somaMilheiros }} milheiros</td>
                        <td>{{ $fo->salario }} reais</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endif
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
        const local = "folhaPagamento";
        const element = document.querySelector('.btn5');
        if (local === "folhaPagamento") {
            element.classList.add('active');
        } else {
            element.classList.remove('justify-content-end');
        }
    }
    window.addEventListener('load', removeClassOnSmallScreen);
    window.addEventListener('resize', removeClassOnSmallScreen);

    function confirmarPagamento() {
        return confirm("Tem certeza de que deseja finalizar essa folha de pagamento?");
    }
</script>
@endsection