<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        [
            'id' => '1',
            'type' => 'Только текст',
            'image' => '/img/no-image2.jpg',
        ],
        [
            'id' => '2',
            'type' => 'Текст + 1 картинка',
            'image' => '/img/no-image.jpg',
        ],
        [
            'id' => '3',
            'type' => 'Текст + картинки',
            'image' => '/img/no-image.jpg',
        ],
        [
            'id' => '4',
            'type' => 'Галерея',
            'image' => '/img/no-image2.jpg',
        ],
        [
            'id' => '5',
            'type' => 'Видеоролик',
            'image' => '/img/no-image.jpg',
        ],
        [
            'id' => '6',
            'type' => 'Страница для создания раздела',
            'image' => '/img/no-image2.jpg',
        ],
        [
            'id' => '7',
            'type' => 'PDF-документ',
            'image' => '/img/no-image.jpg',
        ],
        [
            'id' => '9',
            'type' => 'Excel-файл',
            'image' => '/img/no-image2.jpg',
        ],
        [
            'id' => '8',
            'type' => 'Книга',
            'image' => '/img/no-image2.jpg',
        ],
        [
            'id' => '10',
            'type' => 'iFrame',
            'image' => '/img/no-image2.jpg',
        ],
        ]);
    }
}
