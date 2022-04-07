<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('assets/css/bootstrap.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/style.css')}}" type="text/css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{url('assets/bootstrap.min.css')}}"> --}}
    <title>Cinenma | Movies</title>
</head>
<body>
   
@if (Session::has('user'))
            <!-- Nav tabs -->
<ul class="nav nav-tabs|pills" id="navId" role="tablist">
    <li class="nav-item">
        <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab">Active</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#tab2Id">Action</a>
            <a class="dropdown-item" href="#tab3Id">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#tab4Id">Action</a>
        </div>
    </li>
    <li class="nav-item" role="presentation">
        <a href="#tab5Id" class="nav-link" data-bs-toggle="tab">Another link</a>
    </li>
   
</ul>
@endif




    <script src="{{ url('assets/js/jquery.min.js')}}"></script>
    <script src="{{ url('assets/js/script.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/popper.min.js')}}"></script>
    <script src="{{ url('assets/js/sweetalert2.min.js')}}"></script>
</body>
</html>

