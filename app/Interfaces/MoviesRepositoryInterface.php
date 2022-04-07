<?php

namespace App\Interfaces;

interface MoviesRepositoryInterface 
{
    public function getAllMovies();
    public function getMovieById($movieId);
    public function deleteMovie($movieId);
    public function createMovie(array $movieDetails);
    public function updateMovie($movieId, array $newDetails);
    // public function getFulfilledMovies();
}
