<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('users')->insertGetId([
          'name' => "Leonardo Giraldo Quintero",
          'email' => "test1@email.com",
          'password' => Hash::make('password')  
        ]);
        $this->callWith(PersonalUsersDataSeeder::class,['id'=>$id]);
        $this->callWith(RelUserRolSeeder::class,['id'=>$id]);

    }
}
