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
                'namelinhvuc' => "Bất động sản",
                'id_malinhvuc' => 1
            ],
            [
                'namelinhvuc' => "Giáo dục",
                'id_malinhvuc' => 2
            ],
            [
                'namelinhvuc' => "Y tế",
                'id_malinhvuc' => 3
            ],
            [
                'namelinhvuc' => "Giao thông",
                'id_malinhvuc' => 4
            ]

        ]);
    }
}
