<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContentMuzeiSeeder extends Seeder
{
    public function run()
    {
        // НАСТРОЙКИ
        DB::table('settings')->where('id', '1')->update([
            'theme' => 'muzei',
            'orientation' => 'vertical',
            'title' => 'Название музея',
            'logo' => '/img/sber.png',
        ]);

        // СТРАНИЦЫ
        DB::table('banners')->insert([
        [
            'id' => '1',
            'title' => '1',
            'image' => '/img/muzei/mbn.jpg',
            'created_at' => '2021-03-14 00:00:00'
        ],
        ]);

        // СТРАНИЦЫ
        DB::table('pages')->insert([
        [
            'id' => '1',
            'title' => 'О музее',
            'text' => '',
            'image' => '/img/muzei/6.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'iframe' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-14 00:00:00'
        ],
        [
            'id' => '2',
            'title' => 'Общая информация',
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p>',
            'image' => '/img/muzei/1.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'iframe' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '3',
            'title' => 'История музея',
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p>',
            'image' => '/img/muzei/6.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'iframe' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '4',
            'title' => 'Документ PDF',
            'text' => '',
            'image' => '/img/muzei/3.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => '/img/pdf-test2.pdf',
            'excel' => NULL,
            'iframe' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '5',
            'title' => 'Афиша',
            'text' => '',
            'image' => '/img/muzei/8.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'iframe' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '6',
            'title' => 'Стоимость билетов',
            'text' => '',
            'image' => '/img/muzei/7.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'iframe' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '7',
            'title' => 'Информация для посетителей',
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae vitae dolor quas provident, ipsum, officia labore exercitationem unde repudiandae excepturi consequuntur aperiam sit quisquam soluta ullam amet repellendus numquam molestias libero esse ut reiciendis aliquam expedita inventore. Deserunt consequuntur nam sunt aperiam! Illum minus nulla debitis dolor minima? A, eum.</p>',
            'image' => '/img/muzei/5.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'iframe' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '8',
            'title' => 'Виртуальный тур',
            'text' => '.',
            'image' => '/img/muzei/6.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'iframe' => 'https://rusmuseumvrm.ru/data/vtours/ekaterina_velikaya/index.html?lp=1&lang=ru',
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        ]);

        // СТРАНИЦЫ->ТИПЫ_СТРАНИЦ
        DB::table('page_type')->insert([
            [
                'page_id' => '1',
                'type_id' => '6',
            ],
            [
                'page_id' => '2',
                'type_id' => '1',
            ],
            [
                'page_id' => '3',
                'type_id' => '2',
            ],
            [
                'page_id' => '4',
                'type_id' => '7',
            ],
            [
                'page_id' => '5',
                'type_id' => '1',
            ],
            [
                'page_id' => '6',
                'type_id' => '9',
            ],
            [
                'page_id' => '7',
                'type_id' => '1',
            ],
            [
                'page_id' => '8',
                'type_id' => '10',
            ],
            ]);

        // СХЕМЫ
        DB::table('schemes')->insert([
            'id' => '1',
            'title' => 'Этаж 1',
            'image' => '/img/med/plan01.png',
        ]);
    }
}
