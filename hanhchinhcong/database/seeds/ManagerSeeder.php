<?php

use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('manager')->insert([

            [
                'username' => "phamduclong",
                'password' => "123456",
                'name' => "Phạm Đức Long",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'long@gmail.com',
                'address' => 'Hà Nội',
                'type' => "NoAdmin",
                'block' => 'No',
                'id_mathutuc' => 1
            ],

            [
                'username' => "admin",
                'password' => "123456",
                'name' => "Admin",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'admin@gmail.com',
                'address' => 'Hà Nội',
                'type' => "Admin",
                'block' => 'No',
                'id_mathutuc' => 1
            ]

        ]);
    }
}
