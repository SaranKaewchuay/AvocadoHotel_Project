<?php

use app\models\RoomType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile("frontend\assets\css\style.css");


?>

<style>


.has-danger .control-label,
.has-danger .help-block,
.has-danger .form-control-feedback {
    color: #d9534f;
}
.help-block {
    color: red;
    font-weight: bolder;
}
.help-block-error {
    color: red;
}


</style>


<div class="rooms-form">

    <?php 
    
    $form = ActiveForm::begin(
        [
            'options' => ['enctype'=>'multipart/form-data'],
            'enableAjaxValidation' => true,
            'errorCssClass' => 'has-danger',
            'errorCssClass' => 'input-error',
            'errorSummaryCssClass' => 'alert alert-danger',
            'errorCssClass' => 'error'
        ]
    ); ?>

    <?= $form->field($model, 'room_id') ?>

    <label for="message">Room Type</label>
    <?php $room_type = ArrayHelper::map(RoomType::find()->all(), 'type_id', 'type_name'); ?>
    <?= $form->field($model, 'type_id')->dropDownList(
        $room_type ,
        [
            'prompt'=>'Select',         
        ]             
    )->label(false) ?>

    <label for="message">Cigarette Type</label>
    <?= $form->field($model, 'cigarette_type')->dropDownList(
        [
            'prompt'=>'Select',   
            'Non-Smoking'=>'Non-Smoking',  
            'Smoking'=>'Smoking'       
        ]             
    )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
