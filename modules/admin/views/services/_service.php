<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/** @var \app\models\Services $model */

$childs = \app\models\Services::findAll(['id_parent' => $model->id]);
?>
<div class="col-sm-4">
    <img class="img-service img-rounded" style="background-image: url('<?= $model->img_banner ?>')"/>
</div>
<div class="col-sm-6">
    <h2><?= Html::encode($model->title) ?></h2>

    <?= HtmlPurifier::process($model->content) ?>
</div>
<div class="col-sm-2">
    <a href="/admin/services/update?id=<?= $model->id ?>" class="btn btn-info">
        <i class="fa fa-pencil"></i> Редактировать
    </a>
</div>
<?php if ($childs): ?>
    <div class="col-sm-12">
        <br>
        <ul class="list-group">
            <li class="list-group-item active">Подкатегории</li>
            <?php foreach ($childs as $child): ?>
                <li class="list-group-item">
                    <?= $child->title ?>

                    <a href="/admin/services/update?id=<?= $child->id ?>">
                        <span class="btn btn-info glyphicon glyphicon-pencil"> Редактировать</span>
                    </a>

                    <a href="/admin/services/delete?id=<?= $child->id ?>">
                        <span class="btn btn-danger glyphicon glyphicon glyphicon-trash glyphicon "></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="col-sm-12 text-center">
    <a href="/admin/services/create?id_parent=<?= $model->id ?>"><span class="btn btn-success">
    <i class="fa fa-plus"></i> Добавить подкатегорию</span></a>
</div>
