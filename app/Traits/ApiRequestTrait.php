<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait ApiRequestTrait {

    public function callApi(string $url,string $method, $request, string $token = null) {
        $content= array(
            'HTTP_Accept' =>'application/json'
        );
        if(!is_null($token)){
            $content['Authorization']= 'Bearer ' . $token;
        }
        $call = Request::create('api/'.$url,$method,$request,[],[],[],$content);
        $response = Route::dispatch($call)->getContent();
        return json_decode($response,true);
    }

}