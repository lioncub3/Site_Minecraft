<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;
use app\widgets\BootstrapLinkPager;

use app\models\Gallery;
$this->title = 'Галерея';

$this->registerJsFile('/PropertyGallery/lightgallery.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/PropertyGallery/lightgallery-all.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/PropertyGallery/mousewhele.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/PropertyGallery/picturefill.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJs(<<<JS
    $(document).ready(function() {
      $('#lightgallery').lightGallery({
        pager: true
      });
    });
JS
);
?>

    <link rel="stylesheet" href="/PropertyGallery/lightgallery.css">
    <link rel="stylesheet" href="/PropertyGallery/style.css">

            <ul class="nav nav-pills category" id="myDIV">
                <?php foreach ($services as $key => $service): ?>
                <li class="nav-item">
                    <a class="nav-link <?=($id_services == ++$key)?"active-menu-gallery":"";?>" href="/admin/gallery?id=<?= $service->id?>"><?php echo mb_strtoupper($service->title) ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
<div class="text-center">
    <h4>Фото:<strong> <?=$photos_in_category?></strong></h4>
</div>


    <div class="cont">
        <a class="nav-link" href="/admin/gallery/upload?id=<?=$id_services?>"><button class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Добавить фото</button></a>
        <div class="scroll-area">
            <div class="demo-gallery">
                <ul id="lightgallery">
                    <?php foreach($models as $image):?>
                        <li  id="/images/gallery/<?=$id_services?>/<?=$image->name?>" data-responsive="https://sachinchoolur.github.io/lightGallery/static/img/1-375.jpg 375, https://sachinchoolur.github.io/lightGallery/static/img/1-480.jpg 480, "/images/gallery/<?=$id_services;?>/<?=$image->name?>" 800"
                        data-src="/images/gallery/<?=$id_services?>/<?=$image->name?>" data-sub-html="<h4><?=$image->name?></h4><p><?=$image->description?></p>"
                        data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
                            <a href="">
                                <img class="img-responsive" src="/images/gallery/<?=$id_services?>/<?=$image->name?>">
                                <div class="demo-gallery-poster">
                                    <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
                                </div>
                            </a>
                            </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>


    <?php echo BootstrapLinkPager::widget([ 'pagination' => $pages ]);?>



    <style>
        .cont{
            margin-top: 10px;
        }

        .category{
            display: flex;
            justify-content: center;
        }

        .myPagination{
            display: flex;
            justify-content: center;
        }

        .nav-link{
            background-color: #b7d2ff;
        }

        .active-menu-gallery{
            font-weight: bold;
        }
    </style>