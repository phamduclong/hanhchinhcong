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
                'namethutuc' => "Cấp giấy tờ nhà đất",
                'id_mathutuc' => 1,
                'mucdo' => 1,
                'id_malinhvuc' => 1,
                'linkform'=>'citizen.listform.formcapgiayto'
            ],
            [
                'namethutuc' => "Xin giấy phép mở trường học",
                'id_mathutuc' => 2,
                'mucdo' => 2,
                'id_malinhvuc' => 2,
                'linkform' => 'citizen.listform.formxinphepmo'
            ],
            [
                'namethutuc' => "Xin Trang bị thêm trang thiết bị",
                'id_mathutuc' => 3,
                'mucdo' => 3,
                'id_malinhvuc' => 3,
                'linkform' => 'citizen.listform.formxintrangbi'
            ],
            [
                'namethutuc' => "Xây dựng cột đèn giao thông",
                'id_mathutuc' => 4,
                'mucdo' => 4,
                'id_malinhvuc' => 4,
                'linkform' => 'citizen.listform.formxaydung'
            ]

        ]);
    }
}
