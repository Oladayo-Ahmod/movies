<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('assets/css/bootstrap.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/all.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css//fontawesome.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/style.css')}}" type="text/css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{url('assets/bootstrap.min.css')}}"> --}}
    <title>Cinenma | Movies</title>
</head>
<body>
   
@if (Session::has('user'))
            <!-- Nav tabs -->
    <section>
        <form action="{{route('movies.filter')}}" method="POST" enctype="multipart/form-data">
            <ul class="nav nav-tabs|pills" id="navId" role="tablist">
                @csrf

                <li class="nav-item">
                    <input type="hidden" name="" class="cinema_filter" value="1">
                    <a href="#" onclick="filter_cinema(this)" class="nav-link active " data-bs-toggle="tab">cinema 1</a>
                </li>
                <li class="nav-item">
                    <input type="hidden" name="" class="cinema_filter" value="2">
                    <a href="#" onclick="filter_cinema(this)" class="nav-link active " data-bs-toggle="tab">cinema 2</a>
                </li> <li class="nav-item">
                    <input type="hidden" name="" class="cinema_filter" value="3">
                    <a href="#" onclick="filter_cinema(this)" class="nav-link active cinema_3" data-bs-toggle="tab">cinema 3</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('user')['name']}}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    
                    </div>
                </li>
        </ul>
        </form>
    </section>
   
@endif




    <script src="{{ url('assets/js/jquery.min.js')}}"></script>
    <script src="{{ url('assets/js/script.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/popper.min.js')}}"></script>
    <script src="{{ url('assets/js/sweetalert2.min.js')}}"></script>
</body>
</html>

