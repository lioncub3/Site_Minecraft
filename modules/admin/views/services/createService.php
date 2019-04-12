<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\Services;

$this->title = 'Услуги';

$form = ActiveForm::begin(['id' => 'login-form',]) ?>

<?= $form->field($model, 'title')->textarea(['rows' => '3'])->label('Заголовок') ?>

<?= $form->field($model, 'video') ?>

<?= $form->field($model, 'content')->widget(vova07\imperavi\Widget::class, [
    'id' => 'content',
    'settings' => [
        'lang'              => 'ru',
        'minHeight'         => 250,
        'placeholder'       => 'Описание услуги',
        'plugins' => [
            'fontsize',
            'filemanager' => 'vova07\imperavi\bundles\FileManagerAsset',
        ]
    ]
]);
?>

<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary btn-block']) ?>

<?php ActiveForm::end() ?>
