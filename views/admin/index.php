<?php

use app\models\Order;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <div class="d-flex justify-content-between">
        <div class="">
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <!-- <div class=""> -->
        <img src=" /img/1.jpg" alt="" srcset="" style="width: 150px">
        <!-- </div> -->
    </div>

    <?php Pjax::begin(); ?>
    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        "layout" => "{pager}\n{items}\n{pager}",
        'itemView' => 'item',
        'pager' => ['class' => LinkPager::class]
    ]) ?>

    <?php Pjax::end(); ?>

</div>