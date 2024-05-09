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
        DB::table('settings')->insert([
            [
                'is_site_open'       => true, 
                'admin_items_per_page'      => 10, 
                'site_items_per_page'   => 10,
            ]
        ]);
    }
}
