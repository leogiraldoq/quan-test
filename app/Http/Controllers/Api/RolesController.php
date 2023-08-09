<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\RolesInterface;
use Exception;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    private RolesInterface $rolesRepository;

    public function __construct(RolesInterface $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function showByGroup(Request $request){
        try{
            $validated = $request->validate([
                'group' => 'required|string',
            ]);
            return $this->rolesRepository->showByGroup($request->input('group'));
        }catch(Exception $e){
            return response()->json(["message" => $e->getMessage()],500);
        }
    }
}
