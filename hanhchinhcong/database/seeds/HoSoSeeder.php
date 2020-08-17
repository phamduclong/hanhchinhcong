<?php

use Illuminate\Database\Seeder;

class HoSoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hoso')->insert([


            [
                'namecitizen' => "Vũ Đức Tiến",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'tien@gmail.com',
                'address' => 'Hải Phòng',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'status' => 'Chưa xử Lý',
                'id_mathutuc' => 1,
                'id_hoso' => 1,
                'note'=>null
            ],
            [

                'namecitizen' => "Phạm Hùng Mạnh",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'manh@gmail.com',
                'address' => 'Thanh Hóa',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'status' => 'Chưa xử Lý',
                'id_mathutuc' => 2,
                'id_hoso' => 2,
                'note' => null
            ],
            [

                'namecitizen' => "Phạm Thanh Thiên",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'thien@gmail.com',
                'address' => 'Hưng Yên',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'status' => 'Chưa xử Lý',
                'id_mathutuc' => 3,
                'id_hoso' => 3,
                'note' => null
            ],
            [

                'namecitizen' => "Nguyễn Bá Hiệp",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'hiep@gmail.com',
                'address' => 'Thái Bình',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'status' => 'Chưa xử Lý',
                'id_mathutuc' => 4,
                'id_hoso' => 4,
                'note' => null
            ],
            [

                'namecitizen' => "Nguyễn Đức Hiếu",
                'date_of_birth' => null,
                'phone' => '01234567',
                'email' => 'hieu@gmail.com',
                'address' => 'Thanh Hóa',
                'reason' => "Thích Nộp",
                'file' => 'Không có',
                'status' => 'Chưa xử Lý',
                'id_mathutuc' => 5,
                'id_hoso' => 5,
                'note' => null
            ]

        ]);
    }
}
