<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // types:
// "T" => "text",
// "C" => "checkbox"

        DB::table('settings')->insert([
            [
                'code'        => 'admin_items_per_page', 
                'area'        => 'A',
                'category'    => 'pagination', 
                'type'        => 'T',
                'value'       => 20
            ],
            [
                'code'        => 'site_items_per_page', 
                'area'        => 'S',
                'category'    => 'pagination', 
                'type'        => 'T',
                'value'       => 6
            ],
            [
                'code'        => 'is_site_open', 
                'area'        => 'S',
                'category'    => 'access', 
                'type'        => 'C',
                'value'       => "Y"
            ],
            [
                'code'        => 'is_develop_mode', 
                'area'        => 'S',
                'category'    => 'access', 
                'type'        => 'C',
                'value'       => "N"
            ],            
        ]);
    }
}
