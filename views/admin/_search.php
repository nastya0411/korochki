<?php

use app\models\Name;
use app\models\PayType;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderSerach $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="mt-3">
        Фильтрация заявок:
        <div class="d-flex justify-content-between">

            <?= $form->field($model, 'id') ?>

            <?= $form->field($model, 'name_id')->dropDownList(Name::getNames(), ['prompt' => "Выберете курс"]) ?>

            <?= $form->field($model, 'status_id')->dropDownList(Status::getStatuses(), ['prompt' => "Выберете статус"]) ?>

            <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(), ['prompt' => "Выберете форму оплаты"]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сброс', ["index"], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>