<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BookingSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'guest_name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'line') ?>

    <?= $form->field($model, 'room_id') ?>

    <?php // echo $form->field($model, 'request') ?>

    <?php // echo $form->field($model, 'room_type') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'dateFrom') ?>

    <?php // echo $form->field($model, 'dateTo') ?>

    <?php // echo $form->field($model, 'cigarette_type') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
