<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videoalbums')->insert([
            [
            'title' => 'Тестовое видео',
            'cover' => '/img/no-image.jpg',
            'gallery' => '"\/img\/video.mp4"',
            'created_at' => '2019-09-12 00:00:00'
            ],
        ]);
    }
}
