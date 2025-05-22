<?php

use app\models\Name;
use app\models\PayType;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = 'Заявка № ' . $model->id . ' от ' .
    Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i.s');
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index', 'id' => $model->id], ['class' => 'btn btn-outline-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'name_id',
                'value' => Name::getNames()[$model->name_id]

            ],
            [
                'attribute' => 'status_id',
                'value' => Status::getStatuses()[$model->status_id]

            ],
            [
                'attribute' => 'appointment_date',
                'value' => Yii::$app->formatter->asDate($model->appointment_date, 'php:d.m.Y')

            ],

            [
                'attribute' => 'appointment_time',
                'value' => Yii::$app->formatter->asDate($model->appointment_time, 'php:H:i.s')

            ],
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i.s')

            ],
            [
                'attribute' => 'pay_type_id',
                'value' => PayType::getPayTypes()[$model->pay_type_id]

            ],
        ],
    ]) ?>

</div>