<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

$this->title = 'Услуги';

$this->registerCssFile('/css/admin/services.css');
?>

<style>
    .bordered-bottom {
        border: 1px solid #ddd;
        border-radius: 3px;
        margin-bottom: 14px;
    }
</style>
<div class="table-responsive">

    <?php try {
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'container-fluid'],
            'itemOptions' => ['class' => 'row bordered-bottom'],
            'layout' => "{items}\n{summary}\n{pager}\n",
            'itemView' => '_service',
        ]);
    } catch (Exception $e) { }

    ?>
</div>
