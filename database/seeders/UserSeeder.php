<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'       => 'Alexander', 
                'email'      => 'Alwong@ya.ru', 
                'password'   => '$2y$10$rB08O9GL8w1nlEx0eg3b5OJO17JwN6wrIZkUnjFj/HxyYpoCk/yJu',
                'is_root'    => 1,
                'type'       => 'A',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'name'       => 'Test User', 
                'email'      => 'test@test.test', 
                'password'   => '$2y$10$zE5n5rzNh1F59vEgCqcTwOKsmObhjPWppbcNZI6/CzMe2/xyy/r3W',
                'is_root'    => 0,
                'type'       => 'A',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
