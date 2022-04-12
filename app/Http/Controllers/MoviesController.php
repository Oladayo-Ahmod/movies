<?php

namespace App\Http\Controllers;
use App\Interfaces\MoviesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MoviesController extends Controller
{
    private MoviesRepositoryInterface $movieRepository;

    public function __construct(MoviesRepositoryInterface $movieRepository) 
    {
        $this->moviesRepository = $movieRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json([
            $data = $this->moviesRepository->getAllMovies();
            return response()->json($data);
            // return view('movies',['movies'=>$data]);
        // ]);
    }

    // filter movies
    public function filter(Request $request)
    {
        $data = $this->movieRepository->filterMovies();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMoviesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        // validation
        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'details'=> 'required',
            'location'=> 'required',
            // 'avatar'=>'required|image|max:2048|mimes:jpeg,jgp,png,gif,svg',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $imageName = $request->file('avatar')->extension();
        $imageName = time() . '.' . $imageName;
        // store the image in the public folder
        if(!$request->avatar->move(public_path('assets/images'),$imageName)){ // if images is not valid
            return response()->json('error uploading image, check if it is image');
        }
       
        $movieDetails = [
            'title'=> $request->title,
            'details'=> $request->details,
            'location'=> $request->location,
            'avatar'=> 'assets/images/'.$imageName

        ];
      
            if($this->moviesRepository->createMovies($movieDetails)){
                return response()->json('success');
            }
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) 
    {
        $movieId = $request->route('id');

       $movies = $this->moviesRepository->getMoviesById('location',$request->id);
       return view('movies',compact('movies'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) 
    {
        $movieId = $request->route('id');
        $movieDetails = $request->only([
            'title',
            'location',
            'details',
            'avatar'
        ]);

        return response()->json([
            'data' => $this->moviesRepository->updateMovies($movieId, $movieDetails)
        ]);
    }

    public function destroy(Request $request) 
    {
        $movieId = $request->route('id');
        $this->movieRepository->deleteMovies($movieId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
