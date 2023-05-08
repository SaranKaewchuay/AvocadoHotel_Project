<?php

use app\models\Facilities;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Room Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Room Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'type_id',
            'type_name',
            'discription',
            //'img_url',
            //'price',
            //'capacity',
            //'facilities', 
            // [
            //     'attribute' => 'facilities',
            //     'format' => 'raw',
            //     'contentOptions'=>['class' => 'text-center'],
            //     'value' => function ($model) {
            //         return implode(",",$model->facilities);
            
            //     },
              
            // ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, '_id' => (string) $model->_id]);
                 }
            ],
        ],
    ]); ?>


</div>
