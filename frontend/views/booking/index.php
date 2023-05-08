<?php

use app\models\RoomType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
$total = 0;
$numItem = 0;
$num_room = 0;

?>
<style>
    @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
    }
</style>

<section class="h-100 h-custom overflow-auto"style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-9">
                <h3 class="mb-3 text-success"><b> Booking Lists </b></h3>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                  </div>
                </div>
                <?php foreach ($booking as $model) { ?>                 
                  <?php 
                    $dateFrom =  $model->dateFrom;
                    $dateTo = $model->dateTo;
                    $datediff = ( strtotime($dateTo)-strtotime($dateFrom)) / (60 * 60 * 24);
                  
                    $room = RoomType::find()->where(["type_id"=> $model->room_type])->one();
                  
                    $numItem += 1;
                    $img = explode(",",$room->img_url);
                  ?>
                  <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="row">

                            <div class="col-2">
                              <img src="<?= $img[0]?>"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 200px;">
                            </div>
                            <div class="col-3">
                              <h5 class="text-success "><?= $room->type_name?></h5>
                                <div class="row text-muted  ">
                                        <small>
                                              <b>Room Number:</b> 
                                              <?php 
                                                  $num_room = 0;
                                                  $sum=0;
                                                  for ($i=0; $i < count(array($model->room_id))+10; $i++) { 
                                                    if(empty($model->room_id[$i])){
                                                      break;
                                                    }
                                                    $num_room += 1;
                                                    echo $model->room_id[$i]." ";
                                                  }
                                                  if($model->status != "cancel"){
                                                    $total += ((int) ($model->price *  $datediff))*$num_room;
                                                    $sum += ((int) ($model->price *  $datediff))*$num_room;
                                                  }
                                              ?> 
                                        </small>
                                        <small><b>Type:</b> <?= $model->cigarette_type?> </small>
                                        <small><b>Ckeck In:</b> <?= $model->dateFrom?></small>
                                        <small><b>Ckeck Out:</b> <?= $model->dateTo?></small>
                                </div>
                            </div>
                            <div class="col-3 mt-2">
 
                                  <div  >
                                    <h7 style="color:black"><b><?= $datediff?></b> nights </h7><br>
                                    <h7 style="color:black"><b><?= $num_room?></b> rooms </h7>
                              
                                  </div>
                                  <div >
                                    <h7 style="color:black"><b> $ <?= $model->price?></b></h7><small style="color:black"> (per night) </small><br>
                                    <h7 style="color:black"><b>Total: $<?= $sum?></b></h7>
                                  </div>
        
                            </div>
                            <div class="col-3">
                                    <div class="row">
                                          <?php if ($model->status != "cancel" && $model->status != "check-in" && $model->status != "check-out") { ?>
                                              <div class="col mt-4">
                                                  <div class="text-right mr-0">  
                                                     <?= Html::a('&nbsp; Edit &nbsp;', ['update', '_id' => (string) $model->_id], ['class' => 'btn btn-primary rounded-pill mr-2'],
                                                    ) ?>
                                                  </div>
                                              </div>
                                              <div  class="col mt-4 ml-0">
                                                <div class="text-left"><?= Html::a('Cancel', ['cancel', '_id' => (string) $model->_id], [
                                                  'class' => 'btn btn-danger rounded-pill',
                                                  'data' => [
                                                    'confirm' => 'Are you sure you want to cancel this room ?',
                                                    'method' => 'post',
                                                  ],
                                                ]) ?>
                                                </div>
                                              </div>
                                
                                        <?php }?>
                                    </div>

                                    <div class="row">
                                        <?php if ($model->status == "booked") { ?>
                                          <div class="row text-center rounded-pill bg-success mt-2" style="width:100%;">
                                            <div class="align-items-center">
                                              <small style="color:white;"><b>Status : </b><?= $model->status ?></small>
                                              </div>       
                                          </div>
                                        <?php }?>

                                        <?php if ($model->status == "edit") { ?>
                                          <div class="row text-center rounded-pill bg-warning mt-2 " style="width:100%; background-color: rgb(255,38,100);">
                                              <small style="color:black"><b>Status : </b><?= $model->status ?></small>
                                          </div>
                                        <?php }?>

                                        <?php if ($model->status == "cancel") { ?>
                                          <div class="row text-center rounded-pill bg-danger mt-5 " style="width:100%;">
                                              <small style="color:white" ><b>Status : </b><?= $model->status ?></small>
                                          </div>
                                        <?php }?>

                                          <!-- ------------------------------------------- -->

                                        <?php if ($model->status == "check-in") { ?>
                                          <div class="row text-center rounded-pill mt-5 " style="width:100%; background-color: rgb(176,95, 255);">
                                              <small style="color:white" ><b>Status : </b><?= $model->status ?></small>
                                          </div>
                                        <?php }?>

                                        <?php if ($model->status == "check-out") { ?>
                                          <div class="row text-center rounded-pill mt-5 " style="width:100%; background-color: rgb(44, 136, 255);">
                                              <small style="color:white" ><b>Status : </b><?= $model->status ?></small>
                                          </div>
                                        <?php }?>
                                    </div>
                                    
                              </div>

                              <div class="col-1 text-right" style="color:red; text-decoration: none">
                                      <?= Html::a('<text style="color:red;"><b>X</b><text>', ['delete', '_id' => (string) $model->_id], [
                                                  'class' => 'rounded-pill',
                                                  'data' => [
                                                    'confirm' => 'Are you sure you want to Delete this booked list  ?',
                                                    'method' => 'post',
                                                  ],
                                      ]) 
                                      ?>
                                    </div>

              

                          </div>
                        </div> 
                      </div>
                    </div>
                <?php } ?>   
                <?php $total *= $num_room;?>

                <?php if(!empty($model)){ ?>
                        <div class="col align-self-center text-right text-muted mt-3">
                            <p class="mb-0">You have <?php echo $numItem ?> Rooms Type</p>  
                      </div>
                <?php } ?>
                    

              </div>
              <div class="col-lg-3 mt-5">
                <div class="card bg-dark text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0 text-white">Card details</h5>
                    </div>

                  
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total</p>
                      <p class="mb-2">$ <?php echo $total ?></p>
                    </div>

                    <button type="button" class="btn btn-block btn-lg btn-success rounded-pill">
                      <div class="d-flex justify-content-between ">
                        <span>$ <?php echo $total ?> </span>
                        <small >Checkout <i class="fas fa-long-arrow-alt-right ms-2 " ></i></small>
                      </div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>