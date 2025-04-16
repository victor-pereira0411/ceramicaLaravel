@extends('layouts/navigation')
@section('content')
<div class="dashboard-content px-3 pt-4">
    <div class="fs-4 m-2 mt-1 d-flex justify-content-between flex-column">
        <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
            <h2>Clientes</h2>
            <form action="{{route('cliente.create')}}" method="get">
                <input class="btn btn-primary" type="submit" value="adicionar">
            </form>
        </div>

        <div>

        </div>
    </div>
    @if(session()->has('message'))
        <div class="container">
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                {{ session()->get('message') }} 
                <a href="{{route('cliente')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="container">
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                {{ session()->get('error') }} 
                <a href="{{route('cliente')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if(isset($cliente))
    <div class="">
        <div class="table-responsive m-4 d-flex justify-content-center align-items-center">
            <table class="table table-hover table-sm text-center">
                <thead>
                    <th scope="col">nome</th>
                    <th scope="col">tipo da telha</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @foreach($cliente as $c)
                    <tr scope='row'>
                        <td> {{$c->nome}} </td>
                        <td> {{$c->tipoTelha}} </td>
                        <td headers='4'>
                            <div class='botaos d-flex flex-row gap-1 justify-content-center'>
                                <form action="{{route('cliente.edit', ['id' => $c->id])}}" method='get'>
                                    <input type='submit' class='btn btn-warning' value='editar'>
                                </form>
                                <form action="{{route('cliente.delete', ['id' => $c->id])}}" method='get' onsubmit="return confirmarExclusao()">
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
    @if(!isset($cliente))
    <div class="d-flex justify-content-center mt-5">
        <h4>Você não possui clientes cadastrados!</h4>
    </div>
    @endif
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
        const local = "clientes";
        const element = document.querySelector('.btn7');
        if (local === "clientes") {
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
</script>
@endsection