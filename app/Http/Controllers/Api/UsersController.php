<?php

namespace App\Http\Controllers\Api;;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
use App\Interfaces\UsersInterface;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private UsersInterface $userRepository; 
    
    public function __construct(UsersInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    
    public function create(UsersFormRequest $request){
        try{
            $userValidData = $request->validated();
            $userCreateId = $this->userRepository->create($userValidData);
            $userData = $this->userRepository->showPerId($userCreateId);
            $userData['message'] = "El usuario {$userData['name']} ha sido creado correctamente";
            return response()->json($userData,200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }

    public function update(UsersFormRequest $request){
        try{
            $userValidData = $request->validated();
            $userUpdated = $this->userRepository->update($userValidData);
            $userUpdated['message'] = "El usuario {$userUpdated['name']} ha sido actualizado correctamente";
            return response()->json($userUpdated,200);
        }catch (Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }

    public function delete(UsersFormRequest $request){
        try{
            $userValidData = $request->validated();
            $userNameDelete = $this->userRepository->delete($userValidData['id']);
            return response()->json(["message" => "El usuario {$userNameDelete} ha sido eliminado correctamente"],200);
        }catch (Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }

    public function showAll(){
        try{
            $allUsers = $this->userRepository->showAll();
            return response()->json($allUsers,200);
        }catch (Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }

    public function show(Request $request){
        try{
            $validated = $request->validate([
                'id' => 'required|numeric',
            ]);
            $user = $this->userRepository->showPerId($request->input('id'));
            return response()->json($user,200);
        }catch (Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}

