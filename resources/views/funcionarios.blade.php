@extends('layouts/navigation')
@section('content')
<div class="dashboard-content px-3 pt-4">
    <div class="fs-4 m-2 mt-1 d-flex justify-content-between flex-column">
        <div class="fs-4 m-2 mt-1 d-flex justify-content-between ">
            <h2>Funcionários</h2>
            <form action="{{modalFunc/modalCadastrar.php}}" method="get">
                <input class="btn btn-primary" type="submit" value="adicionar">
            </form>
        </div>

        <div>
            
        </div>
    </div>

        @if(isset($funcionarios))
        <div class="">
            <div class="table-responsive m-4 d-flex justify-content-center align-items-center">
                <table class="table table-hover table-sm text-center">
                    <thead>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">Ganho(milheiro)</th>
                        <th scope="col">Ações</th>
                    </thead>
                    <tbody>
                        @foreach($funcionarios as $funcionario)
                        <tr scope="row">
                            <td>{{$funcionario->name}}</td>
                            <td>{{$funcionario->ganhoMilheiro}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @if(!isset($funcionarios))
        <div class="d-flex justify-content-center mt-5">
            <h4>Você não possui funcionários cadastrados!</h4>
        </div>
        @endif
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