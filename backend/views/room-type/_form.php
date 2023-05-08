<?php
use app\models\Facilities;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoomType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'type_name') ?>

    <?= $form->field($model, 'img_url')->textArea(['maxlength' => 300, 'rows' => 3, 'cols' => 50,'placeholder'=>'.....']) ?>


    <?= $form->field($model, 'discription')->textArea(['maxlength' => 300, 'rows' => 3, 'cols' => 50,'placeholder'=>'.....'])?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'capacity') ?>

    <?php $facilities_items = 
    ArrayHelper::map(Facilities::find()->all(), 'id', 'discription'); ?>
    <?= $form->field($model, 'facilities[]')->dropDownList(
        $facilities_items,
        [
            'prompt'=>'Select Facilities',
            'multiple'=>'multiple'            
        ]             
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
