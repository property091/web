<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>
<body>
    <div class="container">
        <div class="row">
            @include('layout.menu')
        </div>
        <div class="row">
    
            <div class="col-3"></div>
            <div class="col-6">
                <div class="mt-5">
                    @yield('content')
                </div>
            </div>
            <div class="col-3"></div>
                
            
        </div>
    </div>
    

</body>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</html>

