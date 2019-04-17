<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/** @var \app\models\Services $model */
?>
<div class="col-sm-4">
    <img class="img-service img-rounded" style="background-image: url('<?= $model->img_banner ?>')"/>
</div>
<div class="col-sm-6">
    <h2><?= Html::encode($model->title) ?></h2>

    <?= HtmlPurifier::process($model->content) ?>
</div>
<div class="col-sm-2">
    <a href="/admin/carousel/update?id=<?= $model->id ?>" class="btn btn-info">
        <i class="fa fa-pencil"></i> Редактировать
    </a>
</div>
