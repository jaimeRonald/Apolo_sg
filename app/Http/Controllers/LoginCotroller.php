<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCotroller extends Controller
{
    public function login(Request $req){
        $credenciales=$req->only('email','password');
        // return ($credenciales);
        if(!Auth::attempt($credenciales)){
            return response([
                "message"=>"usuario invalido"
            ],401);
        }
        $acces_token=Auth::user()->createToken('authTestToken')->accessToken;

        return response([
            "user"=>Auth::user(),
            "access_token"=>$acces_token
        ]);
    }

    public function home(){
        return "este es el el logeo feliidades";
    }
    //
}
