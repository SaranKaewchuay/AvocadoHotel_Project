<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Booking $model */
$room="";
for ($i=0; $i < count(array($model->room_id))+10; $i++) { 
    if(empty($model->room_id[$i])){
        break;
    }
    $room .= $model->room_id[$i]." ";

}?>

<?php $this->title = 'Update Booking | Room : '.$room?> 


<?php
    $this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', '_id' => (string) $model->_id]];
    $this->params['breadcrumbs'][] = 'Update';
?>
<div class="booking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $model->_id,
    ]) ?>

</div>
