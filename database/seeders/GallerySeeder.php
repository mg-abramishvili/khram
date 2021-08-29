<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photoalbums')->insert([
            [
            'title' => 'Тестовый альбом',
            'gallery'=> '["\/img\/no-image.jpg","\/img\/no-image2.jpg","\/img\/no-image.jpg","\/img\/no-image2.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
        ]);
    }
}
