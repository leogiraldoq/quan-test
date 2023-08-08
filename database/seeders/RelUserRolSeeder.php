<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelUserRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($id): void
    {
        foreach(Role::where('status','Active')->get() as $rol){
            DB::table('rel_user_rol')->insert([
                'user_id' => $id,
                'role_id' => $rol->id
            ]);
        }
    }
}
