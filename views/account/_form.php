<?php

use app\models\Name;
use app\models\PayType;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_id')->dropDownList(Name::getNames(),['prompt' => 'Выберете название курса'])?>

    <div class="d-flex justify-content-start gap-3">
        <?= $form->field($model, 'appointment_date')->textInput(['type' => 'date']) ?>
    
        <?= $form->field($model, 'appointment_time')->textInput(['type' => 'time']) ?>
    </div>

    <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(),['prompt' => 'Выберете способ оплаты'])?>

    <div class="form-group">
        <?= Html::submitButton('отправить', ['class' => 'btn btn-outline-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
