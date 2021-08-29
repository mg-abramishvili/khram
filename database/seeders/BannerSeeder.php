<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    public function run()
    {
        DB::table('banners')->insert([
        [
            'id' => '1',
            'title' => '1',
            'image' => '/img/muzei/mbn.jpg',
        ],
        ]);
    }
}
