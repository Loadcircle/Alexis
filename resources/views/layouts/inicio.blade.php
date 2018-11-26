<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content=@if(isset($description))"{{$description}}"@else"Sper Touring"@endif>
    <meta name="keywords" content=@if(isset($keywords))"{{$keywords}}"@else"Sper Touring"@endif>
    <meta name="author" content=@if(isset($author))"{{$author}}"@else"Sper Touring"@endif>
    <title>@if(isset($titulo)){{$titulo}}@else Sper Touring @endif</title>
    <link rel="icon" href=@if(isset($favicon))"{{asset('').'/'.$favicon}}"@else"{{ asset('image/default/favicon.png') }}"@endif type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('vendor/jquery-3.3.1.slim.min.js') }}"></script>
</head>
<body>

    <!-- inicio del nav superior -->
    <nav id="menu" class="container navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="http://via.placeholder.com/150x70" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Tours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Visado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Boletos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- fin del nav superior -->

    @yield('content')


    <footer class="py-5" style="background: #d0bece;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center" style="border-right: solid 2px #b5a2b5">
                    <span style="color: white">@if(isset($direccion)){{$direccion}}@else Calle Ernesto Plascencia 166 @endif</span>
                    <hr>
                    <p style="color: white">@if(isset($titulo)){{$titulo}}@else Garro Stucchi @endif</p>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center" style="border-left: solid 2px #b5a2b5">
                    <span style="color: white">@if(isset($telefono)){{$telefono}}@else 2213766 @endif</span>
                    <hr>
                    <p style="color: white">@if(isset($facebook)){{$facebook}}@else facebook @endif</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
