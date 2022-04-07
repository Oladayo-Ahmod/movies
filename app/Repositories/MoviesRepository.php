<?php

namespace App\Repositories;

use App\Interfaces\MoviesRepositoryInterface;
use App\Models\Movies;

class MoviesRepository implements MoviesRepositoryInterface 
{
    public function getAllmovies() 
    {
        return Movies::all();
    }

    public function getmoviesById($moviesId) 
    {
        return Movies::findOrFail($moviesId);
    }

    public function deletemovies($moviesId) 
    {
        Movies::destroy($moviesId);
    }

    public function createmovies(array $moviesDetails) 
    {
        return Movies::create($moviesDetails);
    }

    public function updatemovies($moviesId, array $newDetails) 
    {
        return Movies::whereId($moviesId)->update($newDetails);
    }

    // public function getFulfilledmoviess() 
    // {
    //     return movies::where('is_fulfilled', true);
    // }
}
