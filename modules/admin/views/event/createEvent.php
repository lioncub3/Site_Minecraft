<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\Event;

$this->title = 'Календар';

$form = ActiveForm::begin(['id' => 'login-form', 'options' => ['enctype' => 'multipart/form-data'],]) ?>

<?= $form->field($model, 'title')->textInput() ?>

<?= $form->field($model, 'date')->widget(DatePicker::class, [
    'options' => ['placeholder' => 'Введите дату события...', 'autocomplete' => 'off'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd.mm.yyyy',
        'convertFormat' => true
    ]
]) ?>

<?= $form->field($model, 'location')->label('Локация') ?>

<?= $form->field($model, 'content')->textarea(['rows' => '5'])?>

<?= $form->field($model, 'image')->widget(FileInput::class, [
    'options'       => ['accept' => 'image/*'],
    'pluginOptions' => [
        'uploadUrl'             => Url::to(['/images']),
        'initialPreviewAsData'  => true,
        'showPreview'           => true,
        'showCaption'           => false,
        'showRemove'            => false,
        'showUpload'            => false,
        'browseClass'           => 'btn btn-success btn-block',
        'uploadClass'           => 'btn btn-info',
        'removeClass'           => 'btn btn-danger'
    ],
]); ?>

<?=$form->field($model, 'color')->dropDownList(['yellow' => 'Желтый', 'blue' => 'Голубой', 'red' => 'Красный']); ?>

<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
