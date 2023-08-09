<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
use App\Traits\ApiRequestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Laravel\Sanctum\PersonalAccessToken;

class UsersController extends Controller
{
    use ApiRequestTrait;

    public function authUser(Request $request){
        $user = $this->callApi('auth/login','POST',$request->all());
        $user['list'] = self::showAll();
        Cookie::make('api',$user['token'],15);
        return view('users.dashboard',compact("user"));
    }

    public function showAll(){
        return $this->callApi('users/showAll','GET',[],Cookie::get('api'));
    }

    public function logout(Request $request){
        $accessToken = Cookie::get('api');
        Cookie::delete('api');
        $token = PersonalAccessToken::findToken($accessToken);
        $token->delete();
        return view('auth.login');
    }

    public function createUser(UsersFormRequest $request){
        dd($request->all);
    }
}

