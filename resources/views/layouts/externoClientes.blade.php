<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- [yield] Informo que posso ter um conteudo para preencher esse campo-->
    <title>@yield('title')

    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    @section('sidebar')
        <!-- Informo que posso declarar uma sessão com esse titulo -->
        <div class="container-xl">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">link de exemplo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">link de exemplo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">link de exemplo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">link de exemplo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    @show
    <div class="container">
        <!-- Informo que posso ter um conteudo para preencher esse campo-->
        @yield('content')
    </div>
</body>

</html>
