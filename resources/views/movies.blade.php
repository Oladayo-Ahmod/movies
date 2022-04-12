@include('components/header')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="container-fluid mt-5 trending ">
            <h4 class="text-center  my-4">All Movies</h4>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
                  Add Movie
                </button>
                
                
                
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


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Movie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.movie')}}" class="form-group" method="post" enctype="multipart/form-data">
                    <label for="">Title</label>
                    <input type="text" class="form-control title" required name="name">
                    <label for="">Details</label>
                    <input type="text" class="form-control details" required name="details">
                    <label for="image">Avatar</label>
                    <input type="file" class="form-control image" name="image"><br>
                    <select name="category" id="" class="form-control">
                        <option value="">Choose location</option>
                        <option value="1">Location 1</option>
                        <option value="2">Location 2</option>
                        <option value="3">Location 3</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<script>

</script>