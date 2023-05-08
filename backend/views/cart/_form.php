<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Facilities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facilities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'discription_1') ?>

    <?= $form->field($model, 'discription_2') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
