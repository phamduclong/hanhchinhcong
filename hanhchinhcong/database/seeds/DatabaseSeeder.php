<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ManagerSeeder::class);
        $this->call(CitizenSeeder::class);
        $this->call(HoSoSeeder::class);
        $this->call(LinhVucSeeder::class);
        $this->call(ThuTucSeeder::class);
        
        
    }
}
