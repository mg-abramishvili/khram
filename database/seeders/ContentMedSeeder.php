<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContentMedSeeder extends Seeder
{
    public function run()
    {
        // НАСТРОЙКИ
        DB::table('settings')->where('id', '1')->update([
            'theme' => 'med',
            'orientation' => 'horizontal',
            'title' => 'med',
            'logo' => '/img/med-logo.png',
            'module_news_sort' => '07',
            'module_routes_sort' => '04',
            'module_reviews_sort' => '05',
        ]);

        // СТРАНИЦЫ
        DB::table('pages')->insert([
        [
            'id' => '1',
            'sort' => '01',
            'title' => 'Информация о клинике',
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
            'id' => '6',
            'sort' => NULL,
            'title' => 'Карточка организации',
            'text' => '<p>ООО «МАРТ»</p>
            <p>Адрес юридического лица: Россия, 199178, город Санкт-Петербург, Малый В.О. проспект, д. 54, корп. 3, лит. Ж</p>
            
            <p>ИНН 7801607657</p>
            
            <ul>
            <li>УПРАВЛЯЮЩИЙ МАРШАК МАРИНА ЕВГЕНЬЕВНА</li><li>ГЛАВНЫЙ ВРАЧ КОЧАТКОВА АННА АЛЕКСАНДРОВНА</li>
            <li>ГЛАВНЫЙ БУХГАЛТЕР ГЛУЩЕНКО ЗОЯ ВАЛЕНТИНОВНА</li>
            <li>СТАРШАЯ СЕСТРА СУЛЕЙМЕНОВА ОЛЬГА СЕРГЕЕВНА</li>
            </ul>
            
            <p><b>ЧАСЫ РАБОТЫ КЛИНИКИ 08.00-22.00</b></p>
            
            <ul>
            <li>ЛИЧНЫЙ ПРИЕМ УПРАВЛЯЮЩИЙ М.Е. МАРШАК – ПОНЕДЕЛЬНИК 15.00-17.00</li>
            <li>ЛИЧНЫЙ ПРИЕМ ГЛАВНЫЙ ВРАЧ А.А. КОЧАТКОВА – СРЕДА 14.00-17.00</li>
            </ul>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '7',
            'sort' => NULL,
            'title' => 'Часы работы',
            'text' => '<p>Все дни недели с 08.00 до 22.00 кабинет МРТ</p>

            <p>Поликлиническое отделение с 08.30 до 21.00</p>
            
            <p>Без обеда</p>
            
            <p>Без выходных</p>
            
            <p><b>Услуги медицинского центра «МАРТ»</b></p>
            
            <ul>
            <li>Магнитно-резонансная томография</li>
            <li>Ультразвуковая диагностика</li>
            <li>Лабораторная диагностика</li>
            <li>Неврология</li>
            <li>Терапия</li>
            <li>Травматология-ортопедия</li>
            <li>Гинекология</li>
            <li>Урология</li>
            <li>Онкология</li>
            <li>Оториноларингология</li>
            <li>Дерматология</li>
            <li>Мануальная терапия</li>
            <li>ЛФК (пассивная суставная гимнастика)</li>
            <li>Физиотерапия</li>
            <li>Рефлексотерапия</li>
            <li>Процедурный кабинет</li>
            </ul>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '8',
            'sort' => NULL,
            'title' => 'Положение о скидках',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => '/img/med/poloz.pdf',
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '9',
            'sort' => NULL,
            'title' => 'Правила посещения клиники',
            'text' => '<p>Для вашего удобства мы напоминаем за сутки о намеченном визите звонком или SMS-сообщением.</p>

            <p>Если вы неподтвердили свою запись, мы оставляем за собой право ее отменить.</p>
            
            <p>Если у вас не получается прийти, мы будем Вам очень признательны, за своевременную информацию об этом, и подберем Вам другое удобное время.</p>
            
            <p>В случае вашего опоздания более чем на 15 минут, мы будем вынуждены перенести Вашу запись на другое удобное для Вас время, предоставить Вам сокращенную услугу у того же врача или предложить прием у другого, свободного на данный момент врача.</p>
            
            </p>Пациентам, не приходящим по записи более 2-х раз, будет преджложено обслуживание только по предварительной оплате.</p>         
            
            <p>Мы можем открыться раньше или закрыться позже официального времени, в этом случае стоимость обслуживания повышается на 20%. Скидки и программа лояльности в этом случае не действуют.</p>
            ',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '10',
            'sort' => NULL,
            'title' => 'Общество защиты прав потребителей',
            'text' => '<p><b>Общество защиты прав потребителей</b><br>
            Телефон 576-66-62; 576-78-51</p>
            
            <p><b>Комитет по Здравоохранению Администрации Санкт-Петербурга</b></br>
            Телефон 311-09-06</p>
            
            <p><b>Роспотребнадзор</b></br>
            Телефон 764-49-74; 316-68-66</p>
            
            <p>У администратора центра Вы можете получить полную информацию:</p>
            <ul>
            <li>о правилах предоставления мед. организациями платных медицинских услуг</li>
            <li>о правилах внутреннего распорядка для пациентов</li>
            <li>правила ознакомления пациента с медицинской документацией</li>
            <li>порядок подачи обращений граждан</li>
            </ul> 
            <p>Книга жалоб и предложений находится у администратора.</p>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '11',
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
            'id' => '2',
            'sort' => '02',
            'title' => 'Наши врачи',
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
            'title' => 'МРТ',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '20',
            'sort' => NULL,
            'title' => 'УЗД',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '26',
            'sort' => NULL,
            'title' => 'Неврология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '27',
            'sort' => NULL,
            'title' => 'Травматология – ортопедия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '28',
            'sort' => NULL,
            'title' => 'Нейрохирургия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '29',
            'sort' => NULL,
            'title' => 'Гинекология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '30',
            'sort' => NULL,
            'title' => 'Онкология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '31',
            'sort' => NULL,
            'title' => 'Реабилитация',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '32',
            'sort' => NULL,
            'title' => 'Психология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '33',
            'sort' => NULL,
            'title' => 'Дерматология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '34',
            'sort' => NULL,
            'title' => 'Старшая медицинская сестра',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '50',
            'sort' => NULL,
            'title' => 'Клиника Управления болью',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '12',
            'sort' => NULL,
            'title' => 'Стамат Александра Ивановна',
            'text' => '<p>Врач рентгенолог</p><p>Заведующая кабинетом МРТ</p><p>Стаж более 14 лет</p>',
            'image' => '/img/med/doc_stamat.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '4',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '17',
            'sort' => NULL,
            'title' => 'Грибанова Татьяна Геннадьевна',
            'text' => '<p>Врач рентгенолог</p><p>Стаж более 14 лет</p>',
            'image' => '/img/med/doc_gribanova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '4',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '18',
            'sort' => NULL,
            'title' => 'Романова Диана Даниловна',
            'text' => '<p>Врач рентгенолог</p><p>Стаж более 6 лет</p>',
            'image' => '/img/med/doc_romanova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '4',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '19',
            'sort' => NULL,
            'title' => 'Овчинников Артем Сергеевич',
            'text' => '<p>Врач рентгенолог</p><p>Стаж более 8 лет</p>',
            'image' => '/img/med/doc_ovchinnikov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '4',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '21',
            'sort' => NULL,
            'title' => 'Солнцева Ирина Александровна',
            'text' => '<p>Врач ультразвуковой диагностики.</p><p>Стаж более 28 лет.</p><p>Кандидат медицинских наук, Доцент кафедры лучевой диагностики и лучевой терапии СЗГМУ им. И.И. Мечникова.</p><p>Заведующая лучевой диагностикой.</p>',
            'image' => '/img/med/doc_solnceva.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '22',
            'sort' => NULL,
            'title' => 'Яковлева Ольга Михайловна',
            'text' => '<p>Врач ультразвуковой диагностики</p><p>Стаж более 20 лет.</p>',
            'image' => '/img/med/doc_yakovleva.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '23',
            'sort' => NULL,
            'title' => 'Иванов Александр Иванович',
            'text' => '<p>Врач ультразвуковой диагностики</p><p>Стаж более 20 лет.</p>',
            'image' => '/img/med/doc_ivanov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '24',
            'sort' => NULL,
            'title' => 'Соловьева Янина Николаевна',
            'text' => '<p>Врач ультразвуковой диагностики</p><p>Стаж более 5 лет.</p>',
            'image' => '/img/med/doc_soloveva.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '25',
            'sort' => NULL,
            'title' => 'Федоров Борис Анатольевич',
            'text' => '<p>Врач ультразвуковой диагностики</p><p>Стаж более 20 лет.</p>',
            'image' => '/img/med/doc_fedorov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '20',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '35',
            'sort' => NULL,
            'title' => 'Шаповал Николай Сергеевич',
            'text' => '<p>Врач-невролог.</p><p>Специалист по лечению боли.</p><p>Стаж более 8 лет.</p>',
            'image' => '/img/med/doc_shapoval.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '26',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '36',
            'sort' => NULL,
            'title' => 'Синельников Андрей Константинович',
            'text' => '<p>Врач-невролог.</p><p>Специалист по лечению головной и лицевой боли, спастической кривошеи, блефароспазма.</p><p>Стаж более 10 лет.</p>',
            'image' => '/img/med/doc_sidelnikov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '26',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '37',
            'sort' => NULL,
            'title' => 'Черненко Валерий Юрьевич',
            'text' => '<p>Врач-невролог.</p><p>Специалист по лечению боли.</p><p>Стаж более 8 лет.</p>',
            'image' => '/img/med/doc_chernenko.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '26',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '38',
            'sort' => NULL,
            'title' => 'Бизюков Олег Валерьевич',
            'text' => '<p>Врач травматолог – ортопед.</p><p>Стаж более 21 г.</p>',
            'image' => '/img/med/doc_bizyukov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '27',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '39',
            'sort' => NULL,
            'title' => 'Тюликов Константин Владимирович',
            'text' => '<p>Врач-нейрохирург.</p><p>Специалист по лечению боли.</p><p>Врач высшей категории.</p><p>Кандидат медицинских наук.</p><p>Стаж более 14 лет.</p>',
            'image' => '/img/med/doc_tyulikov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '28',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '40',
            'sort' => NULL,
            'title' => 'Трушин Павел Вадимович',
            'text' => '<p>Врач-нейрохирург.</p><p>Специалист по лечению боли.</p><p>Врач высшей категории.</p><p>Кандидат медицинских наук.</p><p>Стаж работы по специальности более 10 лет.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '28',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '41',
            'sort' => NULL,
            'title' => 'Гамзатова Зайнаб Хизриенва',
            'text' => '<p>Врач акушер-гинеколог, эндокринолог.</p><p>Стаж более 18 лет.</p><p>Кандидат медицинских наук.</p><p>Заведующая отделения гинекология.</p>',
            'image' => '/img/med/doc_gamzatova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '29',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '42',
            'sort' => NULL,
            'title' => 'Фролова Маргарита Сергеевна',
            'text' => '<p>Врач акушер-гинеколог.</p><p>Стаж более 5 лет.</p>',
            'image' => '/img/med/doc_frolova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '29',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '43',
            'sort' => NULL,
            'title' => 'Кочаткова Анна Александровна',
            'text' => '<p>Главный врач.</p><p>Врач Онколог (в т. ч. маммолог).</p><p>Стаж более 14 лет.</p><p>Химиотерапевт.</p><p>Кандидат медицинских наук.</p>',
            'image' => '/img/med/doc_kochatkova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '30',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '44',
            'sort' => NULL,
            'title' => 'Лифанова Виктория Юрьевна',
            'text' => '<p>Врач онколог-маммолог.</p><p>Хирург.</p><p>Химиотерапевт.</p><p>Стаж более 5 лет.</p>',
            'image' => '/img/med/doc_lifanova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '30',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '45',
            'sort' => NULL,
            'title' => 'Саломатина Эллина Леонардовна',
            'text' => '<p>Врач-физиотерапевт, рефлексотерапевт.</p><p>Стаж более 33 лет.</p>',
            'image' => '/img/med/doc_salomatina.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '31',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '46',
            'sort' => NULL,
            'title' => 'Кочурин Николай Сергеевич',
            'text' => '<p>Инструктор ЛФК.</p><p>Массажист.</p><p>Стаж более 10 лет.</p>',
            'image' => '/img/med/doc_kochurin.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '31',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '47',
            'sort' => NULL,
            'title' => 'Романенков Андрей Андреевич',
            'text' => '<p>Врач Мануальный терапевт.</p><p>Стаж более 9 лет.</p>',
            'image' => '/img/no-image.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '31',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '48',
            'sort' => NULL,
            'title' => 'Генделева Елена Юрьевна',
            'text' => '<p>Психолог, преподаватель психологии.</p><p>Стаж более 6 лет.</p><p>Член Национальной Ассоциации EMDR России.</p>',
            'image' => '/img/med/doc_gendeleva.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '32',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '49',
            'sort' => NULL,
            'title' => 'Соколов Григорий Никитич',
            'text' => '<p>Врач дерматолог.</p><p>Врач высшей категории.</p><p>Кандидат медицинских наук.</p><p>Доцент кафедры дерматовенерологии Санкт-Петербургского Государственного Университета им.акад. И.П. Павлова.</p><p>Стаж более 25 лет.</p>
            ',
            'image' => '/img/med/doc_sokolov.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '33',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '51',
            'sort' => NULL,
            'title' => 'Сулейменова Ольга Сергеевна',
            'text' => '<p>Стаж более 24 лет.</p>
            ',
            'image' => '/img/med/doc_suleymenova.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '34',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '52',
            'sort' => NULL,
            'title' => 'Гальперин Марк Яковлевич',
            'text' => '<p>Специалист по лечению боли в клинике Е. Малышевой.</p><p>Врач-анестезиолог, альголог.</p><p>Стаж более 30 лет.</p>
            ',
            'image' => '/img/med/doc_galperin.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '50',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '53',
            'sort' => NULL,
            'title' => 'Шубин Дмитрий Николаевич',
            'text' => '<p>Врач-невролог, мануальный терапевт.</p><p>Специалист по лечению боли в клинике Е. Малышевой.</p><p>Стаж более 30 лет.</p>',
            'image' => '/img/med/doc_shubin.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '50',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '3',
            'sort' => '03',
            'title' => 'Прейскурант',
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
            'id' => '13',
            'sort' => NULL,
            'title' => 'Общий прейскурант',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/01.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '14',
            'sort' => NULL,
            'title' => 'МРТ',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/02.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '15',
            'sort' => NULL,
            'title' => 'УЗД',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/03.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '16',
            'sort' => NULL,
            'title' => 'Функциональная диагностика',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/04.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '54',
            'sort' => NULL,
            'title' => 'Терапия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/05.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '55',
            'sort' => NULL,
            'title' => 'Нейрохирургия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/06.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '56',
            'sort' => NULL,
            'title' => 'Неврология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/07.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '57',
            'sort' => NULL,
            'title' => 'Травматология и ортопедия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/08.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '58',
            'sort' => NULL,
            'title' => 'Гастроэнтерология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/09.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '59',
            'sort' => NULL,
            'title' => 'Гинекология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/10.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '60',
            'sort' => NULL,
            'title' => 'Урология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/11.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '61',
            'sort' => NULL,
            'title' => 'Оториноларингология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/12.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '62',
            'sort' => NULL,
            'title' => 'Реабилитация',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/13.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '63',
            'sort' => NULL,
            'title' => 'Сестринское дело',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/14.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '64',
            'sort' => NULL,
            'title' => 'Хирургия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/15.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '65',
            'sort' => NULL,
            'title' => 'Дерматология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/16.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '66',
            'sort' => NULL,
            'title' => 'Управление болью',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/17.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '67',
            'sort' => NULL,
            'title' => 'Лаборатория',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/18.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '68',
            'sort' => NULL,
            'title' => 'Онкология',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/19.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '69',
            'sort' => NULL,
            'title' => 'Нейрохирургия РИЦ',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/20.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '70',
            'sort' => NULL,
            'title' => 'Телемедицина',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/21.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '71',
            'sort' => NULL,
            'title' => 'Выездные медицинские услуги',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/22.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '72',
            'sort' => NULL,
            'title' => 'КДЦ Управления делами Президент',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/22.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '73',
            'sort' => '06',
            'title' => 'Отзыв по QR-коду',
            'text' => '<p>Отсканируйте QR-код с помощью Вашего смартфона и оставьте Ваше отзыв на нашем сайте.</p><p>Для этого перейдите в раздел "Отзывы" и нажмите на кнопку "Оставить отзыв".</p>',
            'image' => '/img/med/qr.jpg',
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
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
                'page_id' => '6',
                'type_id' => '1',
            ],
            [
                'page_id' => '7',
                'type_id' => '1',
            ],
            [
                'page_id' => '8',
                'type_id' => '7',
            ],
            [
                'page_id' => '9',
                'type_id' => '1',
            ],
            [
                'page_id' => '10',
                'type_id' => '1',
            ],
            [
                'page_id' => '11',
                'type_id' => '7',
            ],
            [
                'page_id' => '2',
                'type_id' => '6',
            ],
            [
                'page_id' => '12',
                'type_id' => '2',
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
                'page_id' => '20',
                'type_id' => '6',
            ],
            [
                'page_id' => '26',
                'type_id' => '6',
            ],
            [
                'page_id' => '27',
                'type_id' => '6',
            ],
            [
                'page_id' => '28',
                'type_id' => '6',
            ],
            [
                'page_id' => '29',
                'type_id' => '6',
            ],
            [
                'page_id' => '30',
                'type_id' => '6',
            ],
            [
                'page_id' => '31',
                'type_id' => '6',
            ],
            [
                'page_id' => '32',
                'type_id' => '6',
            ],
            [
                'page_id' => '33',
                'type_id' => '6',
            ],
            [
                'page_id' => '34',
                'type_id' => '6',
            ],
            [
                'page_id' => '13',
                'type_id' => '9',
            ],
            [
                'page_id' => '14',
                'type_id' => '9',
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
                'type_id' => '2',
            ],
            [
                'page_id' => '18',
                'type_id' => '2',
            ],
            [
                'page_id' => '19',
                'type_id' => '2',
            ],
            [
                'page_id' => '21',
                'type_id' => '2',
            ],
            [
                'page_id' => '22',
                'type_id' => '2',
            ],
            [
                'page_id' => '23',
                'type_id' => '2',
            ],
            [
                'page_id' => '24',
                'type_id' => '2',
            ],
            [
                'page_id' => '25',
                'type_id' => '2',
            ],
            [
                'page_id' => '35',
                'type_id' => '2',
            ],
            [
                'page_id' => '36',
                'type_id' => '2',
            ],
            [
                'page_id' => '37',
                'type_id' => '2',
            ],
            [
                'page_id' => '38',
                'type_id' => '2',
            ],
            [
                'page_id' => '39',
                'type_id' => '2',
            ],
            [
                'page_id' => '40',
                'type_id' => '2',
            ],
            [
                'page_id' => '41',
                'type_id' => '2',
            ],
            [
                'page_id' => '42',
                'type_id' => '2',
            ],
            [
                'page_id' => '43',
                'type_id' => '2',
            ],
            [
                'page_id' => '44',
                'type_id' => '2',
            ],
            [
                'page_id' => '45',
                'type_id' => '2',
            ],
            [
                'page_id' => '46',
                'type_id' => '2',
            ],
            [
                'page_id' => '47',
                'type_id' => '2',
            ],
            [
                'page_id' => '48',
                'type_id' => '2',
            ],
            [
                'page_id' => '49',
                'type_id' => '2',
            ],
            [
                'page_id' => '50',
                'type_id' => '6',
            ],
            [
                'page_id' => '51',
                'type_id' => '2',
            ],
            [
                'page_id' => '52',
                'type_id' => '2',
            ],
            [
                'page_id' => '53',
                'type_id' => '2',
            ],
            [
                'page_id' => '54',
                'type_id' => '9',
            ],
            [
                'page_id' => '55',
                'type_id' => '9',
            ],
            [
                'page_id' => '56',
                'type_id' => '9',
            ],
            [
                'page_id' => '57',
                'type_id' => '9',
            ],
            [
                'page_id' => '58',
                'type_id' => '9',
            ],
            [
                'page_id' => '59',
                'type_id' => '9',
            ],
            [
                'page_id' => '60',
                'type_id' => '9',
            ],
            [
                'page_id' => '61',
                'type_id' => '9',
            ],
            [
                'page_id' => '62',
                'type_id' => '9',
            ],
            [
                'page_id' => '63',
                'type_id' => '9',
            ],
            [
                'page_id' => '64',
                'type_id' => '9',
            ],
            [
                'page_id' => '65',
                'type_id' => '9',
            ],
            [
                'page_id' => '66',
                'type_id' => '9',
            ],
            [
                'page_id' => '67',
                'type_id' => '9',
            ],
            [
                'page_id' => '68',
                'type_id' => '9',
            ],
            [
                'page_id' => '69',
                'type_id' => '9',
            ],
            [
                'page_id' => '70',
                'type_id' => '9',
            ],
            [
                'page_id' => '71',
                'type_id' => '9',
            ],
            [
                'page_id' => '72',
                'type_id' => '9',
            ],
            [
                'page_id' => '73',
                'type_id' => '2',
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
