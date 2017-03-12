<?php

namespace Modules\Pearlskin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Pearlskin\Entities;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        Entities\Doctor::truncate();
        Entities\DoctorTranslation::truncate();
        \DB::table('pearlskin__doctors')->insert(
            array(
                array( // row #0
                    'id' => 33,
                    'created_by_user_id' => 1,
                    'updated_by_user_id' => 1,
                    'phone' => '',
                    'image' => 'no_image.jpg',
                    'has_percent' => 0,
                    'is_visible' => 1,
                    'sort_order' => 1,
                    'created_at' => '2016-12-06 18:05:48',
                    'updated_at' => '2017-01-18 18:46:02',
                ),
                array( // row #1
                    'id' => 34,
                    'created_by_user_id' => null,
                    'updated_by_user_id' => null,
                    'phone' => '',
                    'image' => 'no_image.jpg',
                    'has_percent' => 1,
                    'is_visible' => 1,
                    'sort_order' => 2,
                    'created_at' => '2017-01-22 21:00:21',
                    'updated_at' => '2017-01-22 21:00:21',
                ),
                array( // row #2
                    'id' => 43,
                    'created_by_user_id' => null,
                    'updated_by_user_id' => null,
                    'phone' => '',
                    'image' => 'no_image.jpg',
                    'has_percent' => 1,
                    'is_visible' => 1,
                    'sort_order' => 3,
                    'created_at' => '2017-01-22 21:01:30',
                    'updated_at' => '2017-01-23 16:25:14',
                ),
                array( // row #2
                    'id' => 45,
                    'created_by_user_id' => null,
                    'updated_by_user_id' => null,
                    'phone' => '',
                    'image' => 'no_image.jpg',
                    'has_percent' => 0,
                    'is_visible' => 1,
                    'sort_order' => 3,
                    'created_at' => '2017-01-22 21:01:30',
                    'updated_at' => '2017-01-23 16:25:14',
                ),
            )
        );
        \DB::table('pearlskin__doctors_translations')->insert(
            array(
                array( // row #0
                    'names' => 'Д-р Ромелия Николова',
                    'description' => '<p>Др.Николова завършва Медицински Университет - Варна, с образователна степен -Магистър по медицина през 1991 г.</p><p><strong>Специализации:</strong><br />- 2000 г. - Придобиване на специалност &quot;Дерматология и венерология&quot; към Катедра по дерматология и венерология към Александровска болница, София<br />- 2005 г. - Сертифицирано обучение по Ботокс<br />- 2005 г. - Сертифицирано обучение по прилагане на филари / Restylane, Surgyderm/<br />- 2006 г. - Сертифицирано обучение по мезотерапия<br />- Перманентно участиастия в курсове по естетична медицина</p><p>&nbsp;</p><p><strong>Професионален опит:</strong><br />- 1993-1999 г. - Катедра по дерматология и венерология - Варна лекар /резидент/<br />- от 2001 г. Дерматолог към Мед. Център &bdquo;Манус Вита&quot;<br />- 2001-2007 г. Дерматолог към клиника &quot;Skin Line&quot; - Варна<br />- от 2007 г. Дерматолог към Клиника &quot;Pearl Skin&quot; - Варна</p><p><strong>Членство в професионални структури:</strong><br />- Член на БЛС<br />- Член на Българското дерматологично дружество<br />- Член на българското сдружение на частно-практикуващите дерматолози</p><p><strong>Участия в научни форуми:</strong><br />- Редовно участие в българските конгреси по дерматология и венерология</p><p>- Международни участия в EADV /Европейска академия по дерматология и венерология/</p><p>- 2007 г. - Сертифицирано участие в IMCAS /Международен конгрес по естетична дематология и хирургия/ - Париж, Франция.</p><p>- 2007 г. - Медицински сертификат за следдипломно обучение по &bdquo;Безопастно приложение на лазерите в медицината&quot; към НЦООЗ-София.</p><p>- 2008 г. - Сертифицирани участия в Международни клинични Форуми-ЕМЕА за лазерни системи на CUTERA- Барселона,Испания и Женева, Швейцари.</p><p>- 2009 г. - Сертифицирано участие в /Световен конгрес по естетична дерматология и пластична хирургия/ Монако, Монте Карло.</p><p>- 2012 г. &ndash; участие в международен конгрес в областта на естетичната дерматология в Шанхай, Китай.</p><p>- 2014 г. &ndash; участие в трейнинг за мезо конци на Silhouette Soft &ndash; Барселона, Испания.</p>',
                    'doctor_id' => 33,
                    'locale' => 'en',
                ),
                array( // row #1
                    'names' => 'Д-р Ромелия Николова',
                    'description' => '<p>Др.Николова завършва Медицински Университет - Варна, с образователна степен -Магистър по медицина през 1991 г.</p><p><strong>Специализации:</strong><br />- 2000 г. - Придобиване на специалност &quot;Дерматология и венерология&quot; към Катедра по дерматология и венерология към Александровска болница, София<br />- 2005 г. - Сертифицирано обучение по Ботокс<br />- 2005 г. - Сертифицирано обучение по прилагане на филари / Restylane, Surgyderm/<br />- 2006 г. - Сертифицирано обучение по мезотерапия<br />- Перманентно участиастия в курсове по естетична медицина</p><p>&nbsp;</p><p><strong>Професионален опит:</strong><br />- 1993-1999 г. - Катедра по дерматология и венерология - Варна лекар /резидент/<br />- от 2001 г. Дерматолог към Мед. Център &bdquo;Манус Вита&quot;<br />- 2001-2007 г. Дерматолог към клиника &quot;Skin Line&quot; - Варна<br />- от 2007 г. Дерматолог към Клиника &quot;Pearl Skin&quot; - Варна</p><p><strong>Членство в професионални структури:</strong><br />- Член на БЛС<br />- Член на Българското дерматологично дружество<br />- Член на българското сдружение на частно-практикуващите дерматолози</p><p><strong>Участия в научни форуми:</strong><br />- Редовно участие в българските конгреси по дерматология и венерология</p><p>- Международни участия в EADV /Европейска академия по дерматология и венерология/</p><p>- 2007 г. - Сертифицирано участие в IMCAS /Международен конгрес по естетична дематология и хирургия/ - Париж, Франция.</p><p>- 2007 г. - Медицински сертификат за следдипломно обучение по &bdquo;Безопастно приложение на лазерите в медицината&quot; към НЦООЗ-София.</p><p>- 2008 г. - Сертифицирани участия в Международни клинични Форуми-ЕМЕА за лазерни системи на CUTERA- Барселона,Испания и Женева, Швейцари.</p><p>- 2009 г. - Сертифицирано участие в /Световен конгрес по естетична дерматология и пластична хирургия/ Монако, Монте Карло.</p><p>- 2012 г. &ndash; участие в международен конгрес в областта на естетичната дерматология в Шанхай, Китай.</p><p>- 2014 г. &ndash; участие в трейнинг за мезо конци на Silhouette Soft &ndash; Барселона, Испания.</p>',
                    'doctor_id' => 33,
                    'locale' => 'bg',
                ),
                array( // row #2
                    'names' => 'Д-р Ромелия Николова',
                    'description' => '<p>Д-р Николова окончила Медицинский университет - Варна со степенью магистра в</p><p>области медицины в 1991 году.</p><p>Специализации:</p><p>- 2000 г. - Приобретение специальности &laquo;дерматология и венерология&raquo; на кафедре</p><p>дерматологии в Александровской больнице - София</p><p>- 2005 - Сертифицированное обучение по ботоксу</p><p>- 2005 - Сертифицированное обучение по применению наполнителей /Restylane,</p><p>Surgyderm /</p><p>- 2006 - Сертифицированное обучение по мезотерапии</p><p>- Постоянное участие в курсах эстетической медицины</p><p>Профессиональный опыт:</p><p>- 1993 - 1999 &ndash; Кафедра дерматологии и венерологии &ndash; Варна, врач / резидент /</p><p>- 2001 &ndash; Дерматолог в медицинском центре Манус Vita</p><p>- 2001 - 2007 Дерматолог в клинике Skin Line - Варна</p><p>- 2007 &ndash; Дерматолог в Клинике эстетической дерматологии Pearl Skin &ndash; Варна</p><p>- 2010 &ndash; Дерматолог в медицинском центре Сити клиник в Варне.</p><p>Членство в профессиональных организациях:</p><p>- Член БМА</p><p>- Член болгарского дерматологического общества</p><p>- Член Болгарской ассоциации частной практики дерматологов</p><p>Участие в научных форумах:</p><p>- Регулярное участие в болгарском конгрессе по дерматологии и венерологии</p><p>- Международное участие в EADV / Европейской Академии дерматологии и</p><p>венерологии /</p><p>- 2007 - Сертифицированное участие в IMCAS / Международном конгрессе в области</p><p>эстетической дерматологии и хирургии / - Париж, Франция.</p><p>- 2007 - Медицинский сертификат для последипломного обучения в безопасном</p><p>использовании лазеров в медицине в NCPHP - София.</p><p>- 2008 - Сертифицированное участие в международных клинических форумах - EMEA</p><p>лазерные системы Cutera - Барселона, Испания и Женева, Швейцария.</p><p>- 2009 - Сертифицированное участие во Всемирном конгрессе в области эстетической</p><p>дерматологии и пластической хирургии - Монако, Монте-Карло.</p><p>- 2012 - Участие в Международном конгрессе в области эстетической дерматологии в</p><p>Шанхае, Китай.</p><p>- 2014 - Участие в подготовке для мезонитей Silhouette Soft - Барселона, Испания.</p>',
                    'doctor_id' => 33,
                    'locale' => 'ru',
                ),
                array( // row #3
                    'names' => 'Д-р Лиляна Дикманова',
                    'description' => '<p>Др. Дикманова завършва Медицински Университет - Варна с образователна степен - Магистър по медицина през 1996 г.</p><p>&nbsp;</p><p><strong>Специализации:</strong></p><p>- 2003 г. - Придобиване на специалност &quot;Дерматология и венерология&quot; към Катедра по дерматология и венерология - МУ гр.София<br />- 2007 г. - Сертифициранообучение по прилагане на филари.<br />- 2008 г. - Сертифицирано обучение по прилагане на Ботокс.<br />- Перманентно участия в курсове по естетична медицина.</p><p>&nbsp;</p><p><strong>Професионален опит:</strong></p><p>- 2003г. - ДКЦ - 5 &quot;Св. Екатерина&quot;-гр. Варна<br />- 2003-2007 г. - Дермато-естетичен център &quot;Skin Line&quot; - Варна<br />- 2007 г. - Клиника по естетична дерматология &quot;Pearl Skin&quot; Варна</p><p>&nbsp;</p><p><strong>Членство в професионални структури:</strong></p><p>- Член на БЛС<br />- Член на Българското дерматологично дружество<br />- Член на българското сдружение на частно практикуващите дерматолози</p><p>&nbsp;</p><p><strong>Участия в научни форуми и публикации:</strong></p><p>- Редовно участие в българските конгреси по дерматология и венерология.<br />- от 1999-2009 г. редовни участия в сесиите &quot;Рядко наблюдавани клинични случаи&quot;</p>',
                    'doctor_id' => 34,
                    'locale' => 'en',
                ),
                array( // row #4
                    'names' => 'Д-р Лиляна Дикманова',
                    'description' => '<p>Др. Дикманова завършва Медицински Университет - Варна с образователна степен - Магистър по медицина през 1996 г.</p><p>&nbsp;</p><p><strong>Специализации:</strong></p><p>- 2003 г. - Придобиване на специалност &quot;Дерматология и венерология&quot; към Катедра по дерматология и венерология - МУ гр.София<br />- 2007 г. - Сертифициранообучение по прилагане на филари.<br />- 2008 г. - Сертифицирано обучение по прилагане на Ботокс.<br />- Перманентно участия в курсове по естетична медицина.</p><p>&nbsp;</p><p><strong>Професионален опит:</strong></p><p>- 2003г. - ДКЦ - 5 &quot;Св. Екатерина&quot;-гр. Варна<br />- 2003-2007 г. - Дермато-естетичен център &quot;Skin Line&quot; - Варна<br />- 2007 г. - Клиника по естетична дерматология &quot;Pearl Skin&quot; Варна</p><p>&nbsp;</p><p><strong>Членство в професионални структури:</strong></p><p>- Член на БЛС<br />- Член на Българското дерматологично дружество<br />- Член на българското сдружение на частно практикуващите дерматолози</p><p>&nbsp;</p><p><strong>Участия в научни форуми и публикации:</strong></p><p>- Редовно участие в българските конгреси по дерматология и венерология.<br />- от 1999-2009 г. редовни участия в сесиите &quot;Рядко наблюдавани клинични случаи&quot;</p>',
                    'doctor_id' => 34,
                    'locale' => 'bg',
                ),
                array( // row #5
                    'names' => 'Д-р Лиляна Дикманова',
                    'description' => '<p>Др. Дикманова завършва Медицински Университет - Варна с образователна степен - Магистър по медицина през 1996 г.</p><p>&nbsp;</p><p><strong>Специализации:</strong></p><p>- 2003 г. - Придобиване на специалност &quot;Дерматология и венерология&quot; към Катедра по дерматология и венерология - МУ гр.София<br />- 2007 г. - Сертифициранообучение по прилагане на филари.<br />- 2008 г. - Сертифицирано обучение по прилагане на Ботокс.<br />- Перманентно участия в курсове по естетична медицина.</p><p>&nbsp;</p><p><strong>Професионален опит:</strong></p><p>- 2003г. - ДКЦ - 5 &quot;Св. Екатерина&quot;-гр. Варна<br />- 2003-2007 г. - Дермато-естетичен център &quot;Skin Line&quot; - Варна<br />- 2007 г. - Клиника по естетична дерматология &quot;Pearl Skin&quot; Варна</p><p>&nbsp;</p><p><strong>Членство в професионални структури:</strong></p><p>- Член на БЛС<br />- Член на Българското дерматологично дружество<br />- Член на българското сдружение на частно практикуващите дерматолози</p><p>&nbsp;</p><p><strong>Участия в научни форуми и публикации:</strong></p><p>- Редовно участие в българските конгреси по дерматология и венерология.<br />- от 1999-2009 г. редовни участия в сесиите &quot;Рядко наблюдавани клинични случаи&quot;</p>',
                    'doctor_id' => 34,
                    'locale' => 'ru',
                ),
                array( // row #6
                    'names' => 'Д-р Първолета Томова',
                    'description' => '<p>Д-р Томова завършва Медицинския Университет в гр.София през 1999, с образователна степен-Магистър по медицина</p><p><strong>Специализации:</strong></p><p>-Придобиване на специалност по Дерматология и венерология в Катедра по дерматология и венерология към Университетска болница &bdquo; Александровска&ldquo; &nbsp;&ndash; 2005</p><p>- сертифицирано обучение за поставяне на филъри &ndash; 2007</p><p>- сертифицирано обучение за поставяне на ботокс &ndash; 2010</p><p>-сертифицирано обучение за химичен пилинг &ndash; 2011</p><p>- сертифицирани обучения по колагенова мезотерапия GUNA</p><p><strong>Професионален опит:</strong></p><p>2000-2005 Лекар - специализант към Катедра по Дерматология и венерология към Университетска болница &ndash;Александровска</p><p>2006 &ndash; 2010 Медицински консултант по медицинска козметика към фирма Байерсдорф</p><p>2007 &ndash; 2008 Консултант- дерматолог&nbsp; в &sbquo; Seaside&lsquo; &nbsp;SPA център Варна</p><p>2010 Дерматолог в МЦ Аксаково и МЦ Валем</p><p>2013 Дерматолог в Клиника , Pearl skin&lsquo;&nbsp; Варна</p><p><strong>Членство в професионални структури:</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Членство в БЛС</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Членство в Българското &nbsp;Дерматологично дружество</p><p><strong>Участия в научни форуми:</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Редовно участие в националните конференции и конгреси по дерматология и венерология</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Редовно участие в теоретичните и практичните курсове на Лятната академия по естетична дерматология в София</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Участия в редица конгреси и симпозиуми по EADV ( Европейска Академия по дерматология и венерология ) &ndash;Пролетен симпозиум&nbsp; - София 2005 и Букурещ 2009</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Годишни конгреси&nbsp; - Флоренция 2005 , Родос &ndash; 2006, Гьотеборг- 2010, Лисабон &ndash; 2011</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Стипендиант на AAD ( Американската Академия по дерматология ) в Ню Орлеанс -2005</p>',
                    'doctor_id' => 43,
                    'locale' => 'en',
                ),
                array( // row #7
                    'names' => 'Д-р Първолета Томова',
                    'description' => '<p>Д-р Томова завършва Медицинския Университет в гр.София през 1999, с образователна степен-Магистър по медицина</p><p><strong>Специализации:</strong></p><p>-Придобиване на специалност по Дерматология и венерология в Катедра по дерматология и венерология към Университетска болница &bdquo; Александровска&ldquo; &nbsp;&ndash; 2005</p><p>- сертифицирано обучение за поставяне на филъри &ndash; 2007</p><p>- сертифицирано обучение за поставяне на ботокс &ndash; 2010</p><p>-сертифицирано обучение за химичен пилинг &ndash; 2011</p><p>- сертифицирани обучения по колагенова мезотерапия GUNA</p><p><strong>Професионален опит:</strong></p><p>2000-2005 Лекар - специализант към Катедра по Дерматология и венерология към Университетска болница &ndash;Александровска</p><p>2006 &ndash; 2010 Медицински консултант по медицинска козметика към фирма Байерсдорф</p><p>2007 &ndash; 2008 Консултант- дерматолог&nbsp; в &sbquo; Seaside&lsquo; &nbsp;SPA център Варна</p><p>2010 Дерматолог в МЦ Аксаково и МЦ Валем</p><p>2013 Дерматолог в Клиника , Pearl skin&lsquo;&nbsp; Варна</p><p><strong>Членство в професионални структури:</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Членство в БЛС</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Членство в Българското &nbsp;Дерматологично дружество</p><p><strong>Участия в научни форуми:</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Редовно участие в националните конференции и конгреси по дерматология и венерология</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Редовно участие в теоретичните и практичните курсове на Лятната академия по естетична дерматология в София</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Участия в редица конгреси и симпозиуми по EADV ( Европейска Академия по дерматология и венерология ) &ndash;Пролетен симпозиум&nbsp; - София 2005 и Букурещ 2009</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Годишни конгреси&nbsp; - Флоренция 2005 , Родос &ndash; 2006, Гьотеборг- 2010, Лисабон &ndash; 2011</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Стипендиант на AAD ( Американската Академия по дерматология ) в Ню Орлеанс -2005</p>',
                    'doctor_id' => 43,
                    'locale' => 'bg',
                ),
                array( // row #8
                    'names' => 'Д-р Първолета Томова',
                    'description' => '<p>Д-р Томова завършва Медицинския Университет в гр.София през 1999, с образователна степен-Магистър по медицина</p><p><strong>Специализации:</strong></p><p>-Придобиване на специалност по Дерматология и венерология в Катедра по дерматология и венерология към Университетска болница &bdquo; Александровска&ldquo; &nbsp;&ndash; 2005</p><p>- сертифицирано обучение за поставяне на филъри &ndash; 2007</p><p>- сертифицирано обучение за поставяне на ботокс &ndash; 2010</p><p>-сертифицирано обучение за химичен пилинг &ndash; 2011</p><p>- сертифицирани обучения по колагенова мезотерапия GUNA</p><p><strong>Професионален опит:</strong></p><p>2000-2005 Лекар - специализант към Катедра по Дерматология и венерология към Университетска болница &ndash;Александровска</p><p>2006 &ndash; 2010 Медицински консултант по медицинска козметика към фирма Байерсдорф</p><p>2007 &ndash; 2008 Консултант- дерматолог&nbsp; в &sbquo; Seaside&lsquo; &nbsp;SPA център Варна</p><p>2010 Дерматолог в МЦ Аксаково и МЦ Валем</p><p>2013 Дерматолог в Клиника , Pearl skin&lsquo;&nbsp; Варна</p><p><strong>Членство в професионални структури:</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Членство в БЛС</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Членство в Българското &nbsp;Дерматологично дружество</p><p><strong>Участия в научни форуми:</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Редовно участие в националните конференции и конгреси по дерматология и венерология</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Редовно участие в теоретичните и практичните курсове на Лятната академия по естетична дерматология в София</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Участия в редица конгреси и симпозиуми по EADV ( Европейска Академия по дерматология и венерология ) &ndash;Пролетен симпозиум&nbsp; - София 2005 и Букурещ 2009</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Годишни конгреси&nbsp; - Флоренция 2005 , Родос &ndash; 2006, Гьотеборг- 2010, Лисабон &ndash; 2011</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Стипендиант на AAD ( Американската Академия по дерматология ) в Ню Орлеанс -2005</p>',
                    'doctor_id' => 43,
                    'locale' => 'ru',
                ),
                array( // row #9
                    'names' => 'Д-р Силви Георгиева',
                    'description' => '<p>Dr. Silvy Georgieva graduated from MU "Prof. Dr. P.Stoyanov" Varna with Master\'s degree in 2016. Currently she is a doctor specializing in Dermatology. Her interest in this subject is apparent years ago and she regularly reads and follows the development of this area. She annually attends at national and regional conferences, forums, symposiums and workshops on dermatology. She is a member of the BMA. Student of the First Language School - city of Varna. She speaks English, Russian and German.</p>',
                    'doctor_id' => 45,
                    'locale' => 'en',
                ),
                array( // row #10
                    'names' => 'Д-р Силви Георгиева',
                    'description' => '<p>Д-р Силви Георгиева завършва МУ „Проф.д-р П.Стоянов”, гр.Варна с образователна степен магистър през 2016 година. В момента е лекар-специализант по дерматология и венерология. Интересът й към тази специалност се проявява още преди години и редовно чете и следи новостите в тази област. Ежегодно посещава национални и регионални конференции, форуми , симпозиуми и практически обучения по дерматология. Член е на БЛС. Възпитаничка на Първа езикова гимназия - гр. Варна. Владее английски, руски и немски език.</p>',
                    'doctor_id' => 45,
                    'locale' => 'bg',
                ),
                array( // row #11
                    'names' => 'Д-р Силви Георгиева',
                    'description' => '<p>Д-р Силви Георгиева выпустник Медицинского университета им. „Проф.д-р П. Стоянова” в Варне. В 2016 году она получила диплом магистра и в настоящий момент является врачом-специализантом по дерматологии и венерологии. Ее интерес к этой специальности начинается еще с школьных лет. Еще с тех пор она регулярно  следит за новостями в этой области. Каждый год она участвует в национальных и региональных конференциях, форумах, симпозиумах и практических обучениях по дерматологии. Член Болгарского союза врачей. 
                                        Д-р Георгиева закончила Первую школу с преподаванием иностранных языков в Варне. Владеет английским, русским и немецким языками.</p>',
                    'doctor_id' => 45,
                    'locale' => 'ru',
                ),
            )
        );
    }
}