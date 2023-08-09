<?php

    namespace App\Interfaces;

    interface RolesInterface{

        public function showByGroup(array $group):array;
    }