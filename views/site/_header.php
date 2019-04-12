<?php
/** @var  app\models\CarouselData $modelCarouselData */
/** @var  app\models\LoginForm $modelLoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html; ?>
<header>
    <!-- NAVBAR - START -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand animated pulse" href="/"><img src="/images/siteIcons/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Правила</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Моды</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ban list</a>
                    </li>
                </ul>
<!--                <div class="login-container">-->
<!--                    <form action="/action_page.php">-->
<!--                        <input type="text" placeholder="Username" name="username">-->
<!--                        <input type="text" placeholder="Password" name="psw">-->
<!--                        <a class="btn btn-success"><i class="fas fa-sign-in-alt"></i></a>-->
<!--                    </form>-->
<!--                </div>-->
                <div class="container">
                    <div class="row">
                        <input type="text" placeholder="Username" name="username">
                        <input type="text" placeholder="Username" name="username">
                        <a class="btn btn-success"><i class="fas fa-sign-in-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR - END -->

    <!-- CAROUSEL - START -->

    <!-- Wrapper for slides -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <?php foreach ($modelCarouselData as $key => $cl_item): ?>
                <li data-target="#demo"
                    data-slide-to="<?= $key ?>" <?php if (!$key): ?> class="active" <?php endif; ?>></li>
            <?php endforeach; ?>
        </ul>
        <div class="carousel-inner">
            <?php foreach ($modelCarouselData as $key => $cl_item): ?>
                <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
                    <img src="<?= $cl_item->img_banner ?>" alt="<?= $cl_item->title ?>">
                    <!--                    <div class="carousel-caption">-->
                    <!--                        <h3>Los Angeles</h3>-->
                    <!--                        <p>We had such a great time in LA!</p>-->
                    <!--                    </div>-->
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    <!-- CAROUSEL - END -->

</header>
