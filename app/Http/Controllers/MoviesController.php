<?php

namespace App\Http\Controllers;
use App\Interfaces\MoviesRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreMoviesRequest;
use App\Http\Requests\UpdateMoviesRequest;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MoviesController extends Controller
{
    private MoviesRepositoryInterface $orderRepository;

    public function __construct(MoviesRepositoryInterface $moviesRepository) 
    {
        $this->moviesRepository = $moviesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->moviesRepository->getAllOrders()
        ]);
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
    public function store(Request $request): JsonResponse 
    {
        $movieDetails = $request->only([
            'title',
            'location',
            'details',
            'avatar'
        ]);

        return response()->json(
            [
                'data' => $this->moviesRepository->createMovies($movieDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): JsonResponse 
    {
        $movieId = $request->route('id');

        return response()->json([
            'data' => $this->moviesRepository->getMoviesById($movieId)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): JsonResponse 
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

    public function destroy(Request $request): JsonResponse 
    {
        $movieId = $request->route('id');
        $this->movieRepository->deleteMovies($movieId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
