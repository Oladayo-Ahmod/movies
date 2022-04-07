<?php

namespace App\Http\Controllers;
use App\Interfaces\MoviesRepositoryInterface;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;
class UserController extends Controller
{
    private MoviesRepositoryInterface $movieRepository;

    public function __construct(MoviesRepositoryInterface $movieRepository) 
    {
        $this->moviesRepository = $movieRepository;
    }
    //
      // login functionality
      function login(Request $req){
        // validate login
        $validate = $req->validate([
            'email'=> 'required|max:150',
            'password' => 'required',
        ]);
        $data = User::where('email','=',$req->email)->first();
        if ($data) {
            # code...
            if (Hash::check($req->password,$data->password)) {
                Session::put('user',$data);
            $movies = $this->moviesRepository->getAllMovies();

                return view('movies',compact('data','movies'));
            }
            else{
                return back()->with('failure','incorrect email or password');
            }
        }
        else{
            return back()->with('failure','email not found');
        }
         
    }
}
