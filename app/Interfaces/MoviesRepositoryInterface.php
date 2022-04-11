<?php

namespace App\Interfaces;

interface MoviesRepositoryInterface 
{
    public function getAllMovies();
    public function getMoviesById($location,$cinemaId);
    public function deleteMovies($movieId);
    public function createMovies(array $movieDetails);
    public function updateMovies($movieId, array $newDetails);
    public function filterMovies();
    // public function getFulfilledMovies();
}
