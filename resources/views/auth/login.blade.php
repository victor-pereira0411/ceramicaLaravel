<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body shadow">
                        <div class="header-box px-2 pt-3 d-flex justify-content-center">
                            <h1 class="fs-4"><span class="bg-dark text-white rounded shadow px-2 me-2">CS</span> <span class="text-black">CeramicSoft</span></h1>
                        </div>
                        <div class="mensagem px-2 pt-3 pb-4 justify-content-center d-flex ">
                            <div class="d-flex justify-content-center">
                                <h1 class="fs-3">Login</h1>
                            </div>
                        </div>


                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="d-flex flex-column ">
                                <x-input-label class="form-label" for="name" :value="__('Usuário')" />
                                <x-text-input class="form-control mt-1 w-85" id="name" name="name" :value="old('name')" required autofocus autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="d-flex flex-column ">
                                <x-input-label class="form-label" for="password" :value="__('Senha')" />
                                <x-text-input class="form-control mt-1 w-85" id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>



                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>