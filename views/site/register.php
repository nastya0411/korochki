<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="site-register">
    <h1>Регистрация</h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '+7(999)-999-99-99',
    ]) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-outline-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->