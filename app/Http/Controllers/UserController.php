<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
class UserController extends Controller
{
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
                $req->session()->put('user',$data);
                return redirect('/movies');
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
