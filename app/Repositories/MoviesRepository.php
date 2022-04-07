<?php

namespace App\Repositories;

use App\Interfaces\MoviesRepositoryInterface;
use App\Models\movies;

class MoviesRepository implements MoviesRepositoryInterface 
{
    public function getAllmovies() 
    {
        return movies::all();
    }

    public function getmoviesById($moviesId) 
    {
        return movies::findOrFail($moviesId);
    }

    public function deletemovies($moviesId) 
    {
        movies::destroy($moviesId);
    }

    public function createmovies(array $moviesDetails) 
    {
        return movies::create($moviesDetails);
    }

    public function updatemovies($moviesId, array $newDetails) 
    {
        return movies::whereId($moviesId)->update($newDetails);
    }

    // public function getFulfilledmoviess() 
    // {
    //     return movies::where('is_fulfilled', true);
    // }
}
