<?php
use app\models\Facilities;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RoomType */

$this->title = $model->type_name;
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="room-type-view">

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
            'type_id',
            'type_name',
            'img_url',
            'discription',
            'price',
            'capacity',
            //'facilities'
            [
                'attribute' => 'facilities',
                'format' => 'raw',
                //'contentOptions'=>['class' => 'text-center'],
                'value' => function ($model) {
                    return implode(",",$model->facilities);
            
                },
              
            ],
        ],
    ]) ?>

</div>
