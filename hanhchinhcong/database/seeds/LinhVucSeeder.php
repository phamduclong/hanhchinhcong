<?php

use Illuminate\Database\Seeder;

class LinhVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('linhvuc')->insert([


            [
                'name' => "Bất động sản",
                'id_malinhvuc' => 1
            ],
            [
                'name' => "Giáo dục",
                'id_malinhvuc' => 2
            ],
            [
                'name' => "Y tế",
                'id_malinhvuc' => 3
            ],
            [
                'name' => "Giao thông",
                'id_malinhvuc' => 4
            ]

        ]);
    }
}
