<?php

use Illuminate\Database\Seeder;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('citizen')->insert([


            [
                'username' => "vuductien",
                'password' => "123456",
                'name' => "Vũ Đức Tiến",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'tien@gmail.com',
                'address' => 'Hải Phòng',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'block' => 'No',
                'id_hoso' => 1
            ],
            [
                'username' => "phamhungmanh",
                'password' => "123456",
                'name' => "Phạm Hùng Mạnh",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'manh@gmail.com',
                'address' => 'Thanh Hóa',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'block' => 'No',
                'id_hoso' => 2
            ],
            [
                'username' => "vuthanhthien",
                'password' => "123456",
                'name' => "Phạm Thanh Thiên",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'thien@gmail.com',
                'address' => 'Hưng Yên',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'block' => 'No',
                'id_hoso' => 3
            ],
            [
                'username' => "nguyenbahiep",
                'password' => "123456",
                'name' => "Nguyễn Bá Hiệp",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'hiep@gmail.com',
                'address' => 'Thái Bình',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'block' => 'No',
                'id_hoso' => 4
            ],
            [
                'username' => "nguyenduchieu",
                'password' => "123456",
                'name' => "Nguyễn Đức Hiếu",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'hieu@gmail.com',
                'address' => 'Thanh Hóa',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'block' => 'No',
                'id_hoso' => 5
            ]

        ]);
    }
}
