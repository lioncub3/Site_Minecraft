<?php

use yii\db\Migration;

/**
 * Class m190402_103157_filldata
 */
class m190402_103157_filldata extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $new_user = new \app\models\User();

        $new_user->id = 1;
        $new_user->username = 'rosweis';
        $new_user->password = md5('rosweis2019');

        $new_user->save();

        $carousel_data = [
            ['id' => '1', 'img_banner' => '/images/mc1.png', 'title' => 'События',
                'content' => 'Ознакомление с рынком недвижимости по желаемому району/массиву/ЖК.
Консультация и отбор по индивидуальным требованиям обьекта недвижимости в желаемые сроки.
Организация сопровождение просмотров самых выгодных предложений в удобное для вас время.
'],
            ['id' => '2', 'img_banner' => '/images/mc2.jpg', 'title' => 'Путешествия', 'content' => 'Стоимость дизайн проекта  25-50 $ кв.м

- Обмерный план
- Концепция интерьера
- Планировочное решение
- 3D-визуализация пространства
- Рабочая документация
- Комплектация проекта предметами мебели и декора'],
            ['id' => '3', 'img_banner' => '/images/mc3.jpg', 'title' => 'Cвадьбы', 'content' => 'Каталог коллекции картин предоставляется по индивидуальному запросу'],
            ['id' => '4', 'img_banner' => '/images/mc4.jpg', 'title' => 'Детские праздники', 'content' => 'Каталог коллекции мебели предоставляется по индивидуальному запросу'],
        ];

        foreach ($carousel_data as $carousel_item) {
            $new_service = new \app\models\CarouselData();

            $new_service->img_banner = $carousel_item['img_banner'];
            $new_service->title = $carousel_item['title'];
            $new_service->content = $carousel_item['content'];

            $new_service->save();
        }

        $gallery = [
            ['id' => '27','url_image' => 'images/gallery/1/66112019_03_25.jpg','name' => '66112019_03_25.jpg','description' => ''],
            ['id' => '28','url_image' => 'images/gallery/1/72352019_03_25.jpg','name' => '72352019_03_25.jpg','description' => ''],
            ['id' => '29','url_image' => 'images/gallery/1/23592019_03_25.jpg','name' => '23592019_03_25.jpg','description' => ''],
            ['id' => '30','url_image' => 'images/gallery/1/51702019_03_25.jpg','name' => '51702019_03_25.jpg','description' => ''],
            ['id' => '31','url_image' => 'images/gallery/1/53322019_03_25.jpg','name' => '53322019_03_25.jpg','description' => ''],
            ['id' => '32','url_image' => 'images/gallery/1/19542019_03_25.jpg','name' => '19542019_03_25.jpg','description' => ''],
            ['id' => '33','url_image' => 'images/gallery/2/88312019_03_25.jpg','name' => '88312019_03_25.jpg','description' => ''],
            ['id' => '34','url_image' => 'images/gallery/2/88852019_03_25.jpg','name' => '88852019_03_25.jpg','description' => ''],
            ['id' => '35','url_image' => 'images/gallery/2/5672019_03_25.jpg','name' => '5672019_03_25.jpg','description' => ''],
            ['id' => '36','url_image' => 'images/gallery/2/44842019_03_25.jpg','name' => '44842019_03_25.jpg','description' => ''],
            ['id' => '37','url_image' => 'images/gallery/2/71272019_03_25.jpg','name' => '71272019_03_25.jpg','description' => ''],
            ['id' => '38','url_image' => 'images/gallery/2/82512019_03_25.jpg','name' => '82512019_03_25.jpg','description' => ''],
            ['id' => '39','url_image' => 'images/gallery/3/15202019_03_25.jpg','name' => '15202019_03_25.jpg','description' => ''],
            ['id' => '40','url_image' => 'images/gallery/3/59792019_03_25.jpg','name' => '59792019_03_25.jpg','description' => ''],
            ['id' => '41','url_image' => 'images/gallery/3/16492019_03_25.jpg','name' => '16492019_03_25.jpg','description' => ''],
            ['id' => '42','url_image' => 'images/gallery/3/86462019_03_25.jpg','name' => '86462019_03_25.jpg','description' => ''],
            ['id' => '43','url_image' => 'images/gallery/3/62612019_03_25.jpg','name' => '62612019_03_25.jpg','description' => ''],
            ['id' => '44','url_image' => 'images/gallery/3/67402019_03_25.jpg','name' => '67402019_03_25.jpg','description' => ''],
            ['id' => '45','url_image' => 'images/gallery/4/45002019_03_25.jpg','name' => '45002019_03_25.jpg','description' => ''],
            ['id' => '46','url_image' => 'images/gallery/4/91572019_03_25.png','name' => '91572019_03_25.png','description' => ''],
            ['id' => '47','url_image' => 'images/gallery/4/43002019_03_25.jpg','name' => '43002019_03_25.jpg','description' => ''],
            ['id' => '48','url_image' => 'images/gallery/4/41862019_03_25.jpg','name' => '41862019_03_25.jpg','description' => ''],
            ['id' => '49','url_image' => 'images/gallery/4/42192019_03_25.jpg','name' => '42192019_03_25.jpg','description' => ''],
            ['id' => '50','url_image' => 'images/gallery/4/29262019_03_25.jpg','name' => '29262019_03_25.jpg','description' => '']
        ];

        foreach ($gallery as $image) {
            $new_image = new \app\models\Gallery();

            $new_image->url_image = $image['url_image'];
            $new_image->name = $image['name'];
            $new_image->description = $image['description'];

            if (!$new_image->save(false)) {
                var_dump($new_image->errors);
                exit;
            }
        }

        $historys = [
            ['id' => '1', 'image_url' => '/images/history/history-img.jpg', 'description' => '<p>Наверняка вы все знаете, что такое мультибрендовый магазин одежды? Да, это то место мечты, где вы можете приобрести себе все, что вам нужно для вашего образа и жизни: белье, одежду, обувь, парфюм и аксессуары.<br>Компания 4sisters design group родилась как ответ на запрос от клиентов для решения вопросов покупки и создания пространства квартиры, дома, офиса, шоу-рума, ресторана в основе которого было желание объединить талантливых любимых сестер дизайнеров.<br>“Сестры” - это философия ведения бизнеса, где сотрудничество должно основываться на профессионализме, опыте и любви к своему делу; это люди, в продукте которого я буду уверенна и которыми восхищаюсь. Красивое, функциональное и вдохновляющее пространство, в котором хочется отдыхать, творить, работать, жить - это то, что мы готовы создать для вас.<br>С вдохновением к вашим переменам,</p><ol><li>Мария Путилина – основатель 4sisters design group.</li></ol>']
        ];

        foreach ($historys as $history) {
            $new_history = new \app\models\History();

            $new_history->image_url = $history['image_url'];
            $new_history->description = $history['description'];

            if (!$new_history->save(false)) {
                var_dump($new_history->errors);
                exit;
            }
        }

        $settings = [
            ['id' => '1', 'description' => 'События, путешествия, свадьбы, детские праздники', 'keywords' => 'События, путешествия, свадьбы, детские праздники', 'url_image' => '/images/56162019_03_20.icons8-time-64.png', 'name_image' => '56162019_03_20.icons8-time-64.png', 'name' => 'PM - time for event & travel']
        ];

        foreach ($settings as $setting) {
            $new_setting = new \app\models\Settings();

            $new_setting->description = $setting['description'];
            $new_setting->keywords = $setting['keywords'];
            $new_setting->url_image = $setting['url_image'];
            $new_setting->name_image = $setting['name_image'];
            $new_setting->name = $setting['name'];

            $new_setting->save();
        }

        $site_icons = [
            ['id' => '1', 'path' => '/siteIcons/how-we-work-1.svg'],
            ['id' => '2', 'path' => '/siteIcons/how-we-work-2.svg'],
            ['id' => '3', 'path' => '/siteIcons/how-we-work-3.svg'],
            ['id' => '4', 'path' => '/siteIcons/how-we-work-4.svg'],
            ['id' => '5', 'path' => '/siteIcons/how-we-work-5.svg'],
            ['id' => '6', 'path' => '/siteIcons/how-we-work-6.svg']
        ];

        foreach ($site_icons as $site_icon) {
            $new_site_icon = new \app\models\SiteIcons();

            $new_site_icon->path = $site_icon['path'];

            $new_site_icon->save();
        }

        $socials = [
            ['id' => '1', 'instagram' => 'PMTime', 'facebook' => 'https://www.facebook.com/PMTime/', 'twitter' => 'https://twitter.com/PMTime', 'viber' => '+3805012332112']
        ];

        foreach ($socials as $social) {
            $new_social = new \app\models\Social();

            $new_social->instagram = $social['instagram'];
            $new_social->facebook = $social['facebook'];
            $new_social->twitter = $social['twitter'];
            $new_social->viber = $social['viber'];

            $new_social->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190402_103157_filldata cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190402_103157_filldata cannot be reverted.\n";

        return false;
    }
    */
}
