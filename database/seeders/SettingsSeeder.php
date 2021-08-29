<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        // НАСТРОЙКИ
        DB::table('settings')->insert([
            'id' => '1',
            'theme' => 'default',
            'orientation' => 'horizontal',
            'nta' => 'y',
            'logo' => '/img/shkola/logo.png',
            'module_photoalbums' => 'y',
            'module_videoalbums' => 'y',
            'module_news' => 'y',
            'module_routes' => 'y',
            'module_reviews' => 'y',
        ]);
    }
}
