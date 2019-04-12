<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Календарь';

//$this->registerCssFile('/css/admin/services.css');
?>

<a href="/admin/event/create" class="btn btn-primary"> <i class="fa fa-plus"></i> Добавить событие</a><br><br>

<style>
    .img {
        max-width: 150px;
    }
</style>
<div class="table-responsive">

    <?php try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}{summary}{pager}',
            'columns' => [
                [
                    'attribute' => 'img_banner',
                    'format' => 'raw',
                    'value' => function (\app\models\Event $model) {
                        return Html::img($model->img_banner, ['class' => 'img']);
                    },
                ],
                'title:text',
                [
                    'attribute' => 'content',
                    'value' => function (\app\models\Event $model) {
                        return mb_substr($model->content, 0, 50) . '...';
                    },
                ],
                [
                    'attribute' => 'date',
                    'value' => function (\app\models\Event $model) {
                        return (new \DateTime($model->date))->format('d.m.Y');
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{event-update}{event-delete}',
                    'buttons' => [
                        'event-update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/admin/event/update?id=' . $model->id,
                                [
                                    'title' => Yii::t('app', 'Редактировать запись'),
                                    'class' => 'btn btn-success btn-action',
                                    'style' => 'margin: 5px'
                                ]);
                        },
                        'event-delete' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/admin/event/delete?id=' . $model->id,
                                [
                                    'title' => 'Удалить запись',
                                    'class' => 'btn btn-danger btn-action',
                                    'style' => 'margin-left: 5px',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Вы действительно хотите удалить это событие из календаря?'),
                                        'method' => 'post'
                                    ]
                                ]);
                        }
                    ]
                ]
            ]
        ]);

    } catch (Exception $e) {

    }
    ?>
</div>
