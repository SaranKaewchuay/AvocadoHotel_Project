<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Booking;
use app\models\Rooms;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */

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

    $select = "";
    for ($i=0; $i < count(array($model->room_id))+10; $i++) { 
        if(empty($model->room_id[$i])){
        break;
        }
        $select .= $model->room_id[$i]." ";
    }
    $select_room = explode(" ", $select);

    if (($key = array_search(null,$select_room)) !== false) {
        unset($select_room[$key]);
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
    $result = array_merge($select_room, $all);
    $object = array_to_object($result);

?>

<?php $form = ActiveForm::begin(); ?>   
<div class="container-fluid booking pb-5 wow fadeIn "  data-wow-delay="0.1s">
            <div class="container" style="margin-top: 150px;">
                <div class="bg-white shadow" style="padding: 35px;">
                                                    
                    <div class="row g-2">
                        <div class="col-md-9">
                            <div class="row g-2">
                            <div class="col-md-4">
                                <label for="message">Check In</label>
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                
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
                                    ])->label(false);?>
                                   

            
                                    </div>
                            </div>
                                
                                    <div class="col-md-4 ml-5">
                                                <label for="message">Check Out</label>
                                                <div class="form-floating date " id="date4" data-target-input="nearest">                                      
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
                                                </div>
                                    </div> 
                                    <div class="col-md-2 ml-5">
                                            <label for="message">Type</label>
                                            <?= $form->field($model, 'cigarette_type')->dropDownList(
                                                        [
                                                            'prompt'=>'Select Type',
                                                            'Smoking' => 'Smoking',
                                                            'Non-Smoking' => 'Non-Smoking',
                                                        ]
                                                        
                                            )->label(false); ?>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="message"></label>
                            <button type="submit" class="btn btn-success w-100 rounded-pill">Search</button>
                            
                        </div>
                    </div>
                    <?php 
                    ?>
                
                </div>
            </div>
        </div>
</div>
<?php ActiveForm::end(); ?>



<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col">
        <label for="message">Room</label>
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
            <label class="mt-3"for="message">Line</label>
            <?= $form->field($model, 'line')->label(false) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'request') ?>
        </div>
    </div>
    <div class="action">
        <?php
            echo $form->field($model, 'cigarette_type')->hiddenInput(['value'=> $model->cigarette_type])->label(false);
            echo $form->field($model, 'dateFrom')->hiddenInput(['value'=> $model->dateFrom])->label(false);
            echo $form->field($model, 'dateTo')->hiddenInput(['value'=> $model->dateTo])->label(false);
            echo $form->field($model, 'status')->hiddenInput(['value'=> 'edit'])->label(false);
        ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success w-25 rounded-pill']) ?>
    </div>

    <?php ActiveForm::end(); ?>
