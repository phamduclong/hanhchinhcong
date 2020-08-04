<?php

use Illuminate\Database\Seeder;

class ThuTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('thutuc')->insert([


            [
                'name' => "Cấp giấy tờ nhà đất",
                'id_mathutuc' => 1,
                'mucdo' => 1,
                'id_malinhvuc' => 1
            ],
            [
                'name' => "Xin giấy phép mở trường học",
                'id_mathutuc' => 2,
                'mucdo' => 2,
                'id_malinhvuc' => 2
            ],
            [
                'name' => "Xin Trang bị thêm trang thiết bị",
                'id_mathutuc' => 3,
                'mucdo' => 3,
                'id_malinhvuc' => 3
            ],
            [
                'name' => "Xây dựng cột đèn giao thông",
                'id_mathutuc' => 4,
                'mucdo' => 4,
                'id_malinhvuc' => 4
            ]

        ]);
    }
}
