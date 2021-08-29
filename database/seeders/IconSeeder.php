<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->insert([
        [
            'icon' => '/img/icons/001-picture.svg',
        ],
        [
            'icon' => '/img/icons/002-newspaper.svg',
        ],
        [
            'icon' => '/img/icons/003-home.svg',
        ],
        [
            'icon' => '/img/icons/004-pos-terminal.svg',
        ],
        [
            'icon' => '/img/icons/005-shopping-list.svg',
        ],
        [
            'icon' => '/img/icons/006-video-player.svg',
        ],
        [
            'icon' => '/img/icons/007-user.svg',
        ],
        [
            'icon' => '/img/icons/008-briefcase.svg',
        ],
        [
            'icon' => '/img/icons/009-send-file.svg',
        ],
        [
            'icon' => '/img/icons/010-videocall.svg',
        ],
        [
            'icon' => '/img/icons/011-to-do-list.svg',
        ],
        [
            'icon' => '/img/icons/012-files.svg',
        ],
        [
            'icon' => '/img/icons/013-time-management.svg',
        ],
        [
            'icon' => '/img/icons/014-passport.svg',
        ],
        [
            'icon' => '/img/icons/015-book.svg',
        ],
        [
            'icon' => '/img/icons/016-painting.svg',
        ],
        [
            'icon' => '/img/icons/017-old-woman.svg',
        ],
        [
            'icon' => '/img/icons/018-old-man.svg',
        ],
        [
            'icon' => '/img/icons/019-home-1.svg',
        ],
        [
            'icon' => '/img/icons/020-tv.svg',
        ],
        [
            'icon' => '/img/icons/021-email.svg',
        ],
        [
            'icon' => '/img/icons/022-heart.svg',
        ],
        [
            'icon' => '/img/icons/023-settings.svg',
        ],
        [
            'icon' => '/img/icons/024-cinema.svg',
        ],
        [
            'icon' => '/img/icons/025-presentation.svg',
        ],
        [
            'icon' => '/img/icons/026-report.svg',
        ],
        [
            'icon' => '/img/icons/027-pdf.svg',
        ],
        [
            'icon' => '/img/icons/028-jpg.svg',
        ],
        [
            'icon' => '/img/icons/029-information.svg',
        ],
        [
            'icon' => '/img/icons/030-question.svg',
        ],
        [
            'icon' => '/img/icons/031-question-1.svg',
        ],
        [
            'icon' => '/img/icons/032-fast-time.svg',
        ],
        [
            'icon' => '/img/icons/033-box.svg',
        ],
        [
            'icon' => '/img/icons/034-study.svg',
        ],
        [
            'icon' => '/img/icons/035-team.svg',
        ],
        ]);
    }
}
