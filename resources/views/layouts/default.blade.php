<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>

</head>

<body>
    @include('elements.navbar')
    <div class="container">
    @include('elements.flash')
    @yield('content')
    </div>
    

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>