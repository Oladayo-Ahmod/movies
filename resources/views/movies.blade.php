@include('components/header')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="container-fluid mt-5 trending ">
            <h4 class="text-center text-secondary my-4">All Movies</h4>
            <div class="row">
                @foreach($movies as $movie)
                <div class="col-md-3 my-4">
                        <div class="card shadow rounded" style="background-color: transparent; border-color:rgb(230, 230, 248);">
                           <div class="image-hover">
                             <img class="card-img-top rounded trending-image" height="250px" src="../{{$movie['avatar']}}" alt="trending product">
                           </div>
                            <div class="card-body">
                                <h4 class="card-title text-secondary">{{$movie['title']}}</h4>
                                <p class="card-text">{{$movie['details']}}</p>
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