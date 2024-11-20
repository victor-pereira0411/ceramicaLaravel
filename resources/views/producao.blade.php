@extends('layouts/navigation')
@section('content')
<div class="dashboard-content px-3 pt-4">
    <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
        <div class="title-prod d-flex flex-direction-row justify-content-between w-100">
            <h2>Produção</h2>
            <div class="d-flex flex-direction-row gap-3">
                <form action="{{ route('folhaPagamento.store') }}" method="get" onsubmit="return confirmarExclusaoProducao()">
                    <button type="submit" class="btn btn-secondary">
                        Finalizar produção
                    </button>
                </form>
                <form action="{{route('producao.create')}}" method="get">
                    <input class="btn btn-primary" type="submit" value="adicionar">
                </form>
            </div>
        </div>

    </div>
    @if(session()->has('message'))
        <div class="container">
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                {{ session()->get('message') }} 
                <a href="{{route('producao')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if(session()->has('messageWarning'))
        <div class="container">
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                {{ session()->get('messageWarning') }} 
                <a href="{{route('producao')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if(isset($producao))
    <div class="">
        <div class="table-responsive m-4 d-flex justify-content-center align-items-center">
            <table class="table table-hover table-sm text-center">
                <thead>
                    <th scope="col">Data de produção</th>
                    <th scope="col">Milheiros Produzidos</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>

                    @foreach ($producao as $p)
                    <tr scope='row'>
                        <td> {{ date( 'd/m/Y' , strtotime($p->dataProducao))}} </td>
                        <td>  {{$p->milheirosProduzidos}} </td>
                        <td headers='4'>
                            <div class='botaos d-flex flex-row gap-1 justify-content-center'>
                                <form action="{{route('producao.edit', ['id' => $p->id])}}" method='get'>
                                    <input type='submit' class='btn btn-warning' value='editar'>
                                </form>
                                <form action="{{route('producao.delete', ['id' => $p->id])}}" method='get' onsubmit="return confirmarExclusao()">  
                                    @csrf
                                    <input type='submit' class='btn btn-danger' value='excluir'>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if(empty($producao))
    <div class="d-flex justify-content-center mt-5">
        <h4>Você não possui produções cadastradas!</h4>
    </div>
    @endif
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
        const local = "producao";
        const element = document.querySelector('.btn3');
        if (local === "producao") {
            element.classList.add('active');
        } else {
            element.classList.remove('justify-content-end');
        }
    }
    window.addEventListener('load', removeClassOnSmallScreen);
    window.addEventListener('resize', removeClassOnSmallScreen);

    function confirmarExclusao() {
        return confirm("Tem certeza de que deseja deletar este item?");
    }
    function confirmarExclusaoProducao() {
        return confirm("Tem certeza de que deseja finalizar essa produção e a enviar para a folha de pagamento?");
    }
</script>
@endsection