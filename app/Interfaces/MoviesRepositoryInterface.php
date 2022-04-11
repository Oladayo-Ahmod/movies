<?php

namespace App\Interfaces;

interface MoviesRepositoryInterface 
{
    public function getAllMovies();
    public function getMoviesById($movieId);
    public function deleteMovies($movieId);
    public function createMovies(array $movieDetails);
    public function updateMovies($movieId, array $newDetails);
    public function filterMovies($cinemaId);
    // public function getFulfilledMovies();
}
