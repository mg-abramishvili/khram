<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContentShkolaSeeder extends Seeder
{
    public function run()
    {
        // НАСТРОЙКИ
        DB::table('settings')->where('id', '1')->update([
            'theme' => 'shkola',
            'orientation' => 'horizontal',
            'title' => 'Школа №1',
            'logo' => '/img/shkola/logo.png',
            'module_news_sort' => '02',
            'module_routes_sort' => '03',
            'module_reviews_sort' => '08',
            'module_photoalbums_sort' => '04',
        ]);

        // СТРАНИЦЫ
        DB::table('pages')->insert([
        [
            'id' => '1',
            'sort' => '07',
            'title' => 'Информация о школе',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-14 00:00:00'
        ],
        [
            'id' => '2',
            'sort' => NULL,
            'title' => 'Лицензия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => '/img/med/lic.pdf',
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '3',
            'sort' => '04',
            'title' => 'Учителя',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '4',
            'sort' => NULL,
            'title' => 'Математика',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '5',
            'sort' => NULL,
            'title' => 'Физика',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '6',
            'sort' => NULL,
            'title' => 'Химия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '7',
            'sort' => NULL,
            'title' => 'Русский язык',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '8',
            'sort' => NULL,
            'title' => 'Литература',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '9',
            'sort' => NULL,
            'title' => 'Иванова Мария Ивановна',
            'text' => '<p>Текст об учителе.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '4',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '10',
            'sort' => NULL,
            'title' => 'Петров Петр Петрович',
            'text' => '<p>Текст об учителе.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '5',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '11',
            'sort' => NULL,
            'title' => 'Васильева Наталья Юрьевна',
            'text' => '<p>Текст об учителе.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '6',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '12',
            'sort' => NULL,
            'title' => 'Степанов Степан Степанович',
            'text' => '<p>Текст об учителе.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '7',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '13',
            'sort' => NULL,
            'title' => 'Морозова Любовь Александровна',
            'text' => '<p>Текст об учителе.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '8',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '14',
            'sort' => '01',
            'title' => 'Расписание',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '20',
            'sort' => '01',
            'title' => '1-й класс',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '14',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '21',
            'sort' => '01',
            'title' => '2-й класс',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '14',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '15',
            'sort' => NULL,
            'title' => '1А',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '16',
            'sort' => NULL,
            'title' => '1Б',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '17',
            'sort' => NULL,
            'title' => '1В',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '18',
            'sort' => NULL,
            'title' => '1Г',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '19',
            'sort' => NULL,
            'title' => '1Д',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '22',
            'sort' => NULL,
            'title' => '2А',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '21',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '23',
            'sort' => NULL,
            'title' => '2Б',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '21',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '24',
            'sort' => NULL,
            'title' => '2В',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '21',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '25',
            'sort' => NULL,
            'title' => '2Г',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '21',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '26',
            'sort' => NULL,
            'title' => '2Д',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/excel.xlsx',
            'parent_id' => '21',
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
                'page_id' => '3',
                'type_id' => '6',
            ],
            [
                'page_id' => '4',
                'type_id' => '6',
            ],
            [
                'page_id' => '5',
                'type_id' => '6',
            ],
            [
                'page_id' => '6',
                'type_id' => '6',
            ],
            [
                'page_id' => '7',
                'type_id' => '6',
            ],
            [
                'page_id' => '8',
                'type_id' => '6',
            ],
            [
                'page_id' => '2',
                'type_id' => '7',
            ],
            [
                'page_id' => '9',
                'type_id' => '2',
            ],
            [
                'page_id' => '10',
                'type_id' => '2',
            ],
            [
                'page_id' => '11',
                'type_id' => '2',
            ],
            [
                'page_id' => '12',
                'type_id' => '2',
            ],
            [
                'page_id' => '13',
                'type_id' => '2',
            ],
            [
                'page_id' => '14',
                'type_id' => '6',
            ],
            [
                'page_id' => '15',
                'type_id' => '9',
            ],
            [
                'page_id' => '16',
                'type_id' => '9',
            ],
            [
                'page_id' => '17',
                'type_id' => '9',
            ],
            [
                'page_id' => '18',
                'type_id' => '9',
            ],
            [
                'page_id' => '19',
                'type_id' => '9',
            ],
            [
                'page_id' => '20',
                'type_id' => '6',
            ],
            [
                'page_id' => '21',
                'type_id' => '6',
            ],
            [
                'page_id' => '22',
                'type_id' => '9',
            ],
            [
                'page_id' => '23',
                'type_id' => '9',
            ],
            [
                'page_id' => '24',
                'type_id' => '9',
            ],
            [
                'page_id' => '25',
                'type_id' => '9',
            ],
            [
                'page_id' => '26',
                'type_id' => '9',
            ],
            ]);


        // НОВОСТИ
        DB::table('news')->insert([
            [
                'title' => 'Тестовая новость',
                'text' => 'Текст новости 1 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
                'image' => '/img/_2.jpg',
                'created_at' => '2020-10-10 00:00:00'
            ],
            ]);

        // СХЕМЫ
        DB::table('schemes')->insert([
            [
            'id' => '1',
            'title' => 'Этаж 1',
            'image' => '/img/med/plan01.png',
            ],
            [
            'id' => '2',
            'title' => 'Этаж 2',
            'image' => '/img/med/plan02.png',
            ],
            [
            'id' => '3',
            'title' => 'Этаж 3',
            'image' => '/img/med/plan03.png',
            ],
        ]);
    }
}
