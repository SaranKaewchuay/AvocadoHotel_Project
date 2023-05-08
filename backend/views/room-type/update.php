<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoomType */

$this->title = 'Update Room Type: ' . $model->type_name;
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', '_id' => (string) $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
