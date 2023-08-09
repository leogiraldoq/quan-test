<?php

    namespace App\Interfaces;

    interface UsersInterface{

        public function create(Array $newUser):int;
        public function showAll():array;
        public function showPerId(int $id):\App\Models\User;
        public function update(Array $userUpdate):\App\Models\User;
        public function delete(int $idUser);
        public function authUser(string $email):array;
    }