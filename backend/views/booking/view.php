<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Booking $model */

$room="";
for ($i=0; $i < count(array($model->room_id))+10; $i++) { 
    if(empty($model->room_id[$i])){
        break;
    }
    $room .= $model->room_id[$i]." ";

}?>

    <?php $this->title = 'Update Booking | Room : '.$room ?>
<?php 
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', '_id' => (string) $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', '_id' => (string) $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'guest_name',
            'email',
            'line',
            //'room_id',
            'request',
            'room_type',
            'price',
            'user_id',
            'quantity',
            'dateFrom',
            'dateTo',
            'cigarette_type',
            'email',
            'status',
            [
                'attribute' => 'room_id',
                'format' => 'raw',
                //'contentOptions'=>['class' => 'text-center'],
                'value' => function ($model) {
                    return implode(",",$model->room_id);
            
                },
              
            ],
        ],
    ]) ?>

</div>
