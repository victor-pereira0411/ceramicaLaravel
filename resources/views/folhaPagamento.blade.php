@extends('layouts/navigation')
@section('content')
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
        const element = document.querySelector('.btn4');
        if (local === "folhaPagamento") {
            element.classList.add('active');
        } else {
            element.classList.remove('justify-content-end');
        }
    }
    window.addEventListener('load', removeClassOnSmallScreen);
    window.addEventListener('resize', removeClassOnSmallScreen);
</script>
@endsection