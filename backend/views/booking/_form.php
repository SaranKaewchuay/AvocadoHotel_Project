<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Booking;
use app\models\Rooms;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Booking $model */
/** @var yii\widgets\ActiveForm $form */


    function array_to_object($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result= new stdClass();
            foreach ($data as $key => $value)
            {
                $result->$value = array_to_object($value);

            }
            return $result;
        }
        return $data;
    }

    function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = object_to_array($value);
            }
            return $result;
        }
        return $data;
    }
    $booking = Booking::find()->where(["room_type" => $model->room_type])->andWhere(["cigarette_type"=> $model->cigarette_type])->all();
    $rooms = Rooms::find()->andWhere(["type_id"=> $model->room_type])->andWhere(["cigarette_type"=> $model->cigarette_type])->all();

    $not_pass = "";
    foreach ($booking as $index => $booked){
        if ($booked->status != "cancel" && $booked->status != "check-out") {
            
            if ((($booked->dateFrom >= $model->dateFrom) && ($booked->dateFrom < $model->dateTo)) ||
                (($booked->dateFrom < $model->dateFrom) && ($booked->dateTo > $model->dateFrom))) 
            {
                for ($i=0; $i < count(array($booked->room_id))+10; $i++) { 
                    if(empty($booked->room_id[$i])){
                    break;
                    }
                    $not_pass .= $booked->room_id[$i]." ";
                }
                
            }

        }
    }

    $room_not_pass = explode(" ",$not_pass);
    $select = $room_not_pass;
    if (($key = array_search(null, $select)) !== false) {
        unset($select[$key]);
    }

    $allRoom = "";
    foreach ($rooms as $index => $roomAll) {
        $allRoom .= $roomAll->room_id." ";
    }

    $all = explode(" ",$allRoom);
    for ($i = 0; $i < count($room_not_pass); $i++) {
        if (($key = array_search($room_not_pass[$i], $all)) !== false) {
            unset($all[$key]);
        }
    }

    $result = array_merge($select, $all);
    $object = array_to_object($result );



?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'guest_name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'line') ?>
            <label for="message">Rooms</label>
            <?php   
            echo Select2::widget([
                'model' => $model,
                'name' => 'room_id',
                'attribute' => 'room_id',
                'data' => $object,
                'options' => [
                    'placeholder' => 'Select Rooms ...',
                    'multiple' => true
                ],
            ]);
            ?>    
            <?= $form->field($model, 'request') ?>
        </div>
        <div class="col">
             <label for="message">date From</label>
            <?php 
                echo $form->field($model, 'dateFrom')->widget(
                    DatePicker::className(),[
                    'name' => 'dp_3',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'value' => '23-Feb-1982',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ])->label(false);
                                    
        
            ?>
            <?= $form->field($model, 'room_type') ?>
            <?= $form->field($model, 'price') ?>
            <!-- $form->field($model, 'user_id') -->
            <?= $form->field($model, 'quantity') ?>
           
        </div>

        <div class="col">
        <label for="message">date To</label>
        <?php 
                echo $form->field($model, 'dateTo')->widget(
                    DatePicker::className(),[
                    'name' => 'dp_3',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'value' => '23-Feb-1982',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ])->label(false);
                                    
        
            ?>
            <label for="message">Cigarette Type</label>
            <?= $form->field($model, 'cigarette_type')->dropDownList(
                [
                    'prompt'=>'Select Type',
                    'Smoking' => 'Smoking',
                    'Non-Smoking' => 'Non-Smoking',
                ]
                                                        
            )->label(false);?>
            <?= $form->field($model, 'email') ?>
            <label for="message">Status</label>
            <?= $form->field($model, 'status')->dropDownList(
                [  
                    'booked'=>'booked',
                    'check-in' => 'check-in',
                    'check-out' => 'check-out',
                    'edit' => 'edit',
                    'cancel'=>'cancel',
                ]                                          
            )->label(false);?>
        </div>
    </div>

    

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
