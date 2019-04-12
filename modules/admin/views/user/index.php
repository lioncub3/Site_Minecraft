<?php

use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Пользователи';

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <br>
    <div class="alert alert-success alert-dismissable">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<a href="/admin/user/create">
    <button class="btn btn-primary" type="button" name="button"><i class="fa fa-plus"></i> Добавить пользователя</button>
    <br><br>
</a>

<div class="table-responsive">

    <?php try 
    {
        echo GridView::widget([
            'dataProvider'  => $dataProvider,
            'layout'        => '{items}{summary}{pager}',
            'columns'       => [
                'username:text',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{partner-update}{partner-delete}',
                    'buttons' => [
                        'partner-update' => function ($url, $model) {
                            $url = Url::to(['update', 'id' => $model->id]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span> Изменить', $url,
                                [
                                    'title' => 'Изменить',
                                    'class' => 'btn btn-success btn-action',
                                    'style' => 'margin: 5px'
                                ]);
                        },
                        'partner-delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                [
                                    'delete', 'id' => $model->id],
                                [
                                    'title' => 'Удалить',
                                    'class' => 'btn btn-danger btn-action',
                                    'style' => 'margin-left: 5px',
                                    'data' => [
                                        'confirm' => 'Подтвердить?',
                                        'method' => 'post',
                                    ]
                                ]
                            );
                        }
                    ],
                    'contentOptions' => [
                        'style' => 'width: 220px'
                    ]
                ]
            ]
        ]);
    } catch (Exception $e) {
    }
    ?>

</div>
