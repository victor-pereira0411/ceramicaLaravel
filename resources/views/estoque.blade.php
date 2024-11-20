@extends('layouts/navigation')
@section('content')
<div class="dashboard-content px-3 pt-4">
    <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
        <div class="title-prod d-flex flex-direction-row justify-content-between w-100">
            <h2>Estoque</h2>
        </div>

    </div>
    @if(session()->has('message'))
        <div class="container">
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                {{ session()->get('message') }} 
                <a href="{{route('estoque')}}" class="btn btn-close"></a>
            </div>
        </div>
    @endif
    @if(isset($estoque))
    <div class="">
        <div class="table-responsive m-4 d-flex justify-content-center align-items-center">
            <table class="table table-hover table-sm text-center">
                <thead>
                    <th scope="col">Tipo de telha</th>
                    <th scope="col">Milheiros Disponíveis</th>
                    <th scope="col">Valor por milheiro</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>

                    @foreach ($estoque as $e)
                    <tr scope='row'>
                        <td> {{$e->name}} </td>
                        <td>  {{$e->estoqueMilheiros}} </td>
                        <td>  {{$e->valorMilheiro}} </td>
                        <td headers='4'>
                            <div class='botaos d-flex flex-row gap-1 justify-content-center'>
                                <form action="{{route('estoque.edit', ['id' => $e->id])}}" method='get'>
                                    <input type='submit' class='btn btn-warning' value='editar'>
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
    @if(!isset($estoque))
    <div class="d-flex justify-content-center mt-5">
        <h4>Você não possui estoque disponível!</h4>
    </div>
    @endif
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

    function confirmarExclusao() {
        return confirm("Tem certeza de que deseja deletar este item?");
    }
</script>
@endsection