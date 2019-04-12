<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

//AppAsset::register($this);

$this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?= $this->params['modelSettings']->url_image ?>"/>
    <title><?= $this->params['modelSettings']->name ?></title>

    <meta name="description" content="<?= $this->params['modelSettings']->description ?>"/>
    <meta name="keywords" content="<?= $this->params['modelSettings']->keywords ?>"/>

    <?= Html::csrfMetaTags(); ?>

    <link rel="stylesheet" href="/css/bootstrap4.min.css">
    <link rel="stylesheet" href="/css/lightgallery.min.css" >
    <link rel="stylesheet" href="/css/style.css?v=1">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php $this->head(); ?>
</head>
<body>

    <?php $this->beginBody() ?>

    <?= $content ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="/js/lightgallery.min.js"></script> -->
    <!-- <script src='/js/app.js'></script> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"></script> <!-- Font awesome for icons in bottom part-->
    <!-- <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script> -->


    <script>
        $(document).ready(function () {
            $("#qqq").click(function () {
                $.ajax({
                    url: "/site/showcategory", success: function (result) {
                        document.getElementById("#qqq").innerHTML = result.info;
                    }
                });
            });
        });

        $(document).mouseup(function (e) {
            var x = $(".navbar-toggler");
            if (!x.is(e.target) && x.has(e.target).length === 0 && $("#navbarSupportedContent").hasClass("show")) {
                x.click();
            }
        });
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script> -->

    <?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>