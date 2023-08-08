<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalUsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($id): void
    {
        DB::table('personal_users_data')->insert([
            'user_id' => $id,
            'personal_reference' => json_encode(
                [
                    ['names'=>'Pepito Perez', 'phone'=>'12345456678990','email'=>'email@emial.com'],
                    ['names'=>'Jose Giutierrez', 'phone'=>'9087654321','email'=>'email2@emial.com']
                ]
            ),
            'blood_type' => 'O+',
            'phone_number' => '300-987-1234',
            'address' => 'calle 123 # 12 - 3',
            'birth' => '1984-10-04'
        ]);
    }
}