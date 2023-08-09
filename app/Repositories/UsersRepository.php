<?php

namespace App\Repositories;

use App\Interfaces\UsersInterface;
use App\Models\PersonalUserData;
use App\Models\RelUserRole;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersRepository implements UsersInterface
{

    public function create(Array $newUser):int {
       return DB::transaction(function() use ($newUser){
            $userId = DB::table('users')->insertGetId([
                'name' => $newUser['name'],
                'email' => $newUser['email'],
                'password' => $newUser['password']
            ]);
            PersonalUserData::create([
                'user_id' => $userId,
                'personal_reference' => json_encode($newUser['personal_reference']),
                'blood_type' => $newUser['blood_type'],
                'phone_number' => $newUser['phone_number'],
                'address' => $newUser['address'],
                'birth' => $newUser['birth']
            ]);
            self::createRoles($newUser['role'],$userId);
            return $userId;
        });
    }

    public function showPerId(int $id):User
    {
        return User::with('roles','personal_user_data')->find($id);
    }

    public function showAll(): array
    {
        return User::with('roles','personal_user_data')->get()->toArray();
    }

    public function update(Array $userUpdate):User{
        DB::transaction(function () use ($userUpdate){
            $user = User::find($userUpdate['id'])->update([
                'name' => $userUpdate['name'],
                'email' => $userUpdate['email']
            ]);
            $personalData = PersonalUserData::where('user_id',$userUpdate['id'])->update([
                'personal_reference' => json_encode($userUpdate['personal_reference']),
                'blood_type' => $userUpdate['blood_type'],
                'phone_number' => $userUpdate['phone_number'],
                'address' => $userUpdate['address'],
                'birth' => $userUpdate['birth']
            ]);
            self::createRoles($userUpdate['role'],$userUpdate['id']);
        });
        return self::showPerId($userUpdate['id']);
    }

    public function delete(int $idUser){
        $user = User::find($idUser);
        $userName = $user->name;
        $user->delete();
        return $userName;
    }

    public function authUser(string $email):array
    {
        $user = User::with(['roles' => function($query){
                    $query->select("rol");
                    $query->where('group','users');
                }])->where('email',$email)->first();
        $permisions =array_map(function($value){
            return $value['rol'];
        },$user->toArray()['roles']);
        return [
            "token" => $user->createToken("API TOKEN",$permisions)->plainTextToken,
            "name" => $user->name,
            "permisions" => $permisions
        ];
    }


    private function createRoles(Array $roles, int $idUser){
        RelUserRole::where('user_id',$idUser)->delete();
        array_map(function($value) use ($idUser){
            RelUserRole::create([
                'user_id' => $idUser,
                'role_id' => $value
            ]);
        },$roles);
    }
}