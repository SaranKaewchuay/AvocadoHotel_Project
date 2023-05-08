<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Profiles;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.card {
    width: 350px;
    background-color: White;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    border-top-right-radius: 1rem;
    border-top-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
    border-bottom-left-radius: 1rem;
}

.image img {
    transition: all 0.5s
}



.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</style>

<script src="https://example.com/fontawesome/v6.2.0/js/all.js" data-auto-replace-svg="nest"></script>

<div class="profiles-index">
    <!-- <?php foreach ($users as $model) { ?> -->
    <?php $user = Profiles::find()->where(["user_id"=>(String)Yii::$app->user->identity->id])->one(); ?>
    <?php if(empty($user)) { ?>
        <?php echo Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']); ?>
    <?php } else { ?>   
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <h2>Profile</h2>
                <hr>
                <button class="btn btn-secondary"> <img src="<?= $user->img_url?>" height="100" width="130" /></button> 
                <hr>
                <span class="name mt-3"><?=$user->firstname." ".$user->lastname?></span> 
                <hr>
                <span class="idd">E-mail : <?= $user->email?></span>
                <hr>
                <span class="idd">Phone : <?= $user->telephone?></span>
                <hr>
                <div class=" d-flex mt-2"> 
                    <?= Html::a('Edit', ['update', '_id' => (string) $user->_id], ['class' => 'btn btn-success']) ?>
                </div>
                <div class=" px-2 rounded mt-4 date "> 
                    <span class="join">Joined May,2021</span> 
                </div>
            </div>
        </div>
    <?php } ?> 
    <!-- <?php }?>  -->
    </div>
</div>
