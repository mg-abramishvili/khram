<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
            IconSeeder::class,
            NewsSeeder::class,
            GallerySeeder::class,
            VideoGallerySeeder::class,
            SettingsSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
