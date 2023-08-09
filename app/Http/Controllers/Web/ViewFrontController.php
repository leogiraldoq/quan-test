<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Traits\ApiRequestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class ViewFrontController extends Controller
{
    use ApiRequestTrait;


    public function login(){
        Cookie::forget('api');
        return view('auth.login');
    }

    public function usercreate(){
        return view('users.create');
    }

    public function userupdate($id){
        return dd($id);
        $user = $this->callApi('/users/show','POST',array(["id"=>$id]),Cookie::get('api'));
        return view('users.update',compact('user'));
    }
}
