@include('components/header')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="container-fluid mt-5 trending ">
            <h4 class="text-center  my-4">All Movies</h4>
       
            <div class="row rows">
                @foreach($movies as $movie)
                <div class="col-md-3 my-4 toggle_display">
                    <input type="hidden" name="" class="cinema_location" value="{{$movie['location']}}">
                        <div class="card shadow rounded" style="background-color: transparent; border-color:rgb(230, 230, 248);">
                           <div class="image-hover">
                             <img class="card-img-top rounded trending-image" height="250px" src="../{{$movie['avatar']}}">
                           </div>
                            <div class="card-body">
                                <h6 class="card-title ">{{$movie['title']}}</h6>
                                <small class="card-text">{{$movie['details']}}</small> <br>
                                <i class="fas fa-clock"></i><small class="card-text">
                                    @php
                                        $mov = date('j M Y ',strtotime($movie['created_at']));
                                    @endphp
                                    {{$mov}}</small>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>

</script>