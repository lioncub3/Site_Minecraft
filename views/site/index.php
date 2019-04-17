<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/** @var app\models\History $modelHistory */
/** @var  app\models\Gallery[] $modelGalleryDesign */
/** @var  app\models\Social $modelSocial */
/** @var  app\models\Contacts $modelContacts */
/** @var  app\models\Gallery $modelGallery */
/** @var  app\models\CarouselData $modelCarouselData */
/** @var  app\models\LoginForm $modelLoginForm */

?>

<header>
    <?= $this->render('_header', ['modelLoginForm' => $modelLoginForm]); ?>

    <?= $this->render('_carousel', ['modelCarouselData' => $modelCarouselData]); ?>
</header>
<main>

    <!-- CONTACT UP - START -->
    <section class='contact-us'>
        <a class='contact-link' href="#"><img src="/images/siteIcons/play.svg" alt=""></a>
        <h3>Играй с нами!</h3>
    </section>
    <!-- CONTACT UP - END -->

    <!-- HISTORY - START -->
<!--    <section class="history">-->
<!--        <div class="container">-->
<!--            <h3 class="title"><span>История</span></h3>-->
<!--            <div class="row history-block">-->
<!--                <div class="history-block">-->
<!--                    <div class="desc">-->
<!--                        <div class="bdr-bottom"></div>-->
<!--                        <div class="bdr-left"></div>-->
<!--                        <div class="bdr-top"></div>-->
<!--                        <p>--><?php //echo $modelHistory->description ?><!--</p>-->
<!--                    </div>-->
<!--                    <div class="image">-->
<!--                        <img src="--><?php //echo $modelHistory->image_url ?><!--" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <!-- HISTORY - END -->
    <!-- BACK-TO-UP BUTTON - START -->
    <div class="back-to-top">
        <i class="arrow-up"></i>
    </div>
    <!-- BACK-TO-UP BUTTON - END -->
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="contacts">
                <div class="block left">
                    <a href="/"><img src="/images/siteIcons/logo.png" alt=""></a>
                </div>
                <div class="block middle">
                    <a target="_blank" href="<?= $modelSocial->twitter ?>"><i class="fab fa-discord"></i></a>
                    <a target="_blank" href="https://www.instagram.com/<?= $modelSocial->instagram ?>"><i
                                class="fab fa-instagram"></i></a>
                    <a target="_blank" href="<?= $modelSocial->facebook ?>"><i class="fab fa-facebook-f"></i></a>
                    <a target="_blank" href="<?= $modelSocial->twitter ?>"><i class="fab fa-twitter"></i></a>
                    <a href="tel:<?= $modelSocial->viber ?>"><i class="fab fa-viber"></i></a>
                </div>
                <div class="block right">

                </div>
            </div>
        </div>
    </div>
</footer>
