<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthFormRequest;
use App\Interfaces\UsersInterface;
use Exception;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    private UsersInterface $userRepository; 

    public function __construct(UsersInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(AuthFormRequest $request){
        try{
            $dataLoguinValidated = $request->validated();
            if(!Auth::attempt(['email' => $dataLoguinValidated['email'], 'password' => $dataLoguinValidated['password']])){
                return response()->json(['message' =>'Contraseña incorrecta, intentelo de nuevo'],401);
            }
            $dataAccess = $this->userRepository->authUser($dataLoguinValidated['email']);
            return response()->json([
                "message" => "Bienvenido {$dataAccess['name']}",
                "token" => $dataAccess['token'],
                "permisions" => $dataAccess['permisions'],
            ]);
        }catch (Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}
