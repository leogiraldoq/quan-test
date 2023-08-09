<?php
    namespace App\Repositories;

    use App\Interfaces\RolesInterface;
    use App\Models\Role;

    class RolesRepository implements RolesInterface
    {
        public function showByGroup(array $group):array{
            return Role::where('status','Active')->where('group',$group)->get()->toArray();
        }
    }