<?php

use yii\helpers\HTML;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use vova07\imperavi\Widget;

//<!-- connect language file -->
$this->registerJsFile(Yii::getAlias('@web/js/external/ru.js'));

$this->title = 'Правила';

$form = ActiveForm::begin([
    'id'                        => 'history-form',
    'enableClientValidation'    => true,
    'method'                    => 'post',
    'action'                    => ['update?id=' . $id],
    'options'                   => [
        'enctype'   => 'multipart/form-data'
    ]
]); ?>

<?= $form->field($model, 'content')->widget(Widget::class, [
    'id'            => 'content',
    'settings'      => [
        'lang'              => 'ru',
        'minHeight'         => 200,
        'plugins' => [
            'fontsize',
            'fullscreen'
        ]
    ]
]); ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>