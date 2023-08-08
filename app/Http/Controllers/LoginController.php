<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{



    public function loginApi(Request $request){
        $call = Request::create('api/auth/login','POST',$request->all(),[],[],[],[
            'HTTP_Accept' => 'application/json',
        ]);
        $response = Route::dispatch($call)->getContent();
        $user = json_decode($response,true);
        return view('dashboard',compact('user'));
    }
}

