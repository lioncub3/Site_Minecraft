<?php
/** @var  app\models\CarouselData $modelCarouselData */
/** @var  app\models\LoginForm $modelLoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$fieldOptions1 = [
    'options' => ['class' => 'form-control mr-sm-2']
];

$fieldOptions2 = [
    'options' => ['class' => 'form-control mr-sm-2'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
    <!-- NAVBAR - START -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand animated pulse" href="/"><img src="/images/siteIcons/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/site/rules">Правила</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Моды</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ban list</a>
                    </li>
                </ul>
                <?php if(Yii::$app->user->isGuest):
                $form = ActiveForm::begin(['id' => 'log-form', 'options' => ['class' => 'form-inline my-1 my-lg-0'], 'enableClientValidation' => false]); ?>
                    <?= $form
                        ->field($modelLoginForm, 'username')
                        ->label(false)
                        ->textInput(['placeholder' => $modelLoginForm->getAttributeLabel('username')]) ?>
                    <?= $form
                        ->field($modelLoginForm, 'password')
                        ->label(false)
                        ->passwordInput(['placeholder' => $modelLoginForm->getAttributeLabel('password')]) ?>
                    <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i>', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                <?php ActiveForm::end(); ?>
                <a href="/site/signup" class="btn btn-info">Регистрация</a>
                <?php else: ?>
                <a href="/personoffice" class="btn btn-info pull-right">
                    Личный кабинет
                </a>
                <a href="/site/logout" class="btn btn-danger">Выйти</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- NAVBAR - END -->
