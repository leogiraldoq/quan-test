<?php

    namespace App\Interfaces;

use App\Models\User;

    interface UsersInterface{

        public function create(Array $newUser):int;
        public function showAll():\App\Models\User;
        public function showPerId(int $id):\App\Models\User;
        public function update(Array $userUpdate):\App\Models\User;
        public function delete(int $idUser);
        public function authUser(string $email):array;
    }