<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([[
            'group' => 'users',
            'rol' => 'Create',
            'description' => 'Solo puede insertar o crear usuarios'
        ],
        [
            'group' => 'users',
            'rol' => 'Update',
            'description' => 'Solo puede actualizar usuarios'
        ],
        [
            'group' => 'users',
            'rol' => 'Delete',
            'description' => 'Solo puede eliminar usuarios'
        ]]);
    }
}
