<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if($title) {{$title}} @else {{"Inventory System"}} @endif</title>
    <link rel="icon" type="image/png" href="{{ asset('images/brand_logo.png') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/my-css.css') }}" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ route('home.admin') }}">
            <img class="brand-logo" src="{{asset('images/brand_logo.png')}}" alt="">
            Inventory-Sys</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(Route::is('products.view')) {{'active'}} @endif">
                <a class="nav-link" href="{{ route('products.view') }}">Product 
                </a>
            </li>
            <li class="nav-item  @if(Route::is('suppliers.view')) {{'active'}} @endif">
                <a class="nav-link" href="#">
                    Suppliers
                </a>
            </li>
            <li class="nav-item  @if(Route::is('costumers.view')) {{'active'}} @endif">
                <a class="nav-link" href="#">
                    Costumers
                </a>
            </li>
            <li class="nav-item  @if(Route::is('logs.view')) {{'active'}} @endif">
                <a class="nav-link" href="#">
                    Logs
                </a>
            </li>
            </ul>
            
            <a class="btn btn-danger my-2 my-sm-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </div>
        </nav>
    <div class="container">
        
        @yield('content')

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script> --}}
</body>
</html>