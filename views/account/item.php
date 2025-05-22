<?php

use app\models\Name;
use app\models\Status;
use yii\bootstrap5\Html;

?>
<div class="card my-3">
    <div class="card-header">
        Заявка № <?= $model->id . ' от ' .
                        Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i.s') ?>
    </div>
    <div class="card-body">
        <h5 class="card-title">Информация по заявке</h5>
        <div>
            <div>
                Название курса: <?= Name::getNames()[$model->name_id]  ?>
            </div>
            <div>
                Статус заявки: <?= Status::getStatuses()[$model->status_id] ?>
            </div>
            <div>
                Дата начала курса: <?= Yii::$app->formatter->asDate($model->appointment_date, 'php:d.m.Y')  ?>
            </div>
            <div class="mb-3">
                Дата и время создания заявки: <?= Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i.s') ?>
            </div>
        </div>
        <div>
        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-info']) ?>
        </div>
    </div>
</div>