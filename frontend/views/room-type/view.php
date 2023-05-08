

<?php
use app\models\Facilities;
use app\models\Booking;
use app\models\Rooms;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;


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


$this->title = $model->type_name;
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$facilities= Facilities::find()->where(["id" => $model-> facilities])->all();
$booking = Booking::find()->where(["room_type" => $model->type_id])->andWhere(["cigarette_type"=> $bookingModel->cigarette_type])->all();
$rooms = Rooms::find()->andWhere(["type_id"=> $model->type_id])->andWhere(["cigarette_type"=> $bookingModel->cigarette_type])->all(); 

$not_pass = "";

foreach ($booking as $index => $booked){
    if ($booked->status != "cancel" && $booked->status != "check-out") {
        
        if ((($booked->dateFrom >= $bookingModel->dateFrom) && ($booked->dateFrom < $bookingModel->dateTo)) ||
            (($booked->dateFrom < $bookingModel->dateFrom) && ($booked->dateTo > $bookingModel->dateFrom))) 
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
$allRoom = "";
foreach ($rooms as $index => $roomAll) {
    $allRoom .= $roomAll->room_id." ";
}

$all = explode(" ",$allRoom);

// Cut Room not pass condition

for ($i = 0; $i < count($room_not_pass); $i++) {
    if (($key = array_search($room_not_pass[$i], $all)) !== false) {
        unset($all[$key]);
    }
}


$object = array_to_object($all);
?>

<div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <div class="row">
                                <div class="col-4">
                                    <img src="../assets/img/logo.png" width="65" height="70"alt="" class="mr-0 p-0">
                                </div>
                                <div class="col-8 m-0  p-0">
                                    <h2 class="m-0 text-uppercase mr-5 mt-3"style="color:#95CE24">Avocado</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="row gx-0 bg-white d-none d-lg-flex">
                            <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope me-2" style="color:#95CE24 "></i>
                                <p class="mb-0">avocado_hotel@gmail.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa-solid fa-phone-volume" style="color:#95CE24 "></i>
                                <p class="mb-0 ml-1"> 089 873 4906</p>
                            </div>
                            </div>
                            <div class="col-lg-5 px-5 text-end">
                                <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href="#contact"><i class="fab fa-facebook-f" style="color:#1A990D"></i></a>
                                <a class="me-3" href="#contact"><i class="fab fa-twitter" style="color:#1A990D "></i></a>
                                <a class="me-3" href="#contact"><i class="fab fa-linkedin-in" style="color:#1A990D "></i></a>
                                <a class="me-3" href="#contact"><i class="fab fa-instagram" style="color:#1A990D "></i></a>
                                <a class="me-3" href="#contact"><i class="fab fa-youtube" style="color:#1A990D "></i></a>
                                </div>
                            </div>
                        </div>

                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                            <a href="index.html" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                
                            <a href="#contact" class="btn btn-success rounded-0 py-4 px-md-5 d-none d-lg-block">Contacts<i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid page-header mb-5 p-0" style="background-image: url(https://shorturl.asia/Wx6B5);">
                <div class="container-fluid page-header-inner py-5">
                    <div class="container text-center pb-5">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Room Detail</h1>
                        
                    </div>
                </div>
            </div>

<?php $form = ActiveForm::begin(); ?>   
<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                                                    
                    <div class="row g-2">
                        <div class="col-md-9">
                            <div class="row g-2">
                            <div class="col-md-4">
                                <label for="message">Check In</label>
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                
                                    <?php 
                                    echo $form->field($bookingModel, 'dateFrom')->widget(
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
                                
                                    <div class="col-md-4 ml-5">
                                                <label for="message">Check Out</label>
                                                <div class="form-floating date " id="date4" data-target-input="nearest">                                      
                                                    <?php
                                                        echo $form->field($bookingModel, 'dateTo')->widget(
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
                                            <?= $form->field($bookingModel, 'cigarette_type')->dropDownList(
                                                        [
                                                            'prompt'=>'Select Type',
                                                            'Smoking' => 'Smoking',
                                                            'Non-Smoking' => 'Non-Smoking',
                                                        ]
                                                        
                                            )->label(false);?>
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
<div class="site-index">
    <div class="room-type-view">
        <div class="bg-white p-0">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <div id="room-carousel" class="carousel slide mb-5 wow fadeIn" data-bs-ride="carousel"
                                data-wow-delay="0.1s">
                                <?php $i=0?>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                        <?php 
                                            $img = explode(",",$model->img_url);  
                                            $i=0;
                                        ?>
                                        <div class="carousel-inner">
                                        <?php foreach($img as $p){?>
                                            <?php if($i==0){?>
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="<?= ($p) ?>" alt="First slide">
                                                </div>
                                            <?php }
                                                else{?>
                                                <div class="carousel-item ">
                                                    <img class="d-block w-100" src="<?= ($p) ?>" alt="First slide">
                                                </div>
                                            <?php }?>
                                        <?php $i+=1; }?>
                                        </div>
                                    
                                    <a class="carousel-control-prev" type="button" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" type="button" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
                                <div class="ps-3">
                                    <small class="fa fa-star" style="color:#95CE24 "></small>
                                    <small class="fa fa-star" style="color:#95CE24 "></small>
                                    <small class="fa fa-star" style="color:#95CE24 "></small>
                                    <small class="fa fa-star" style="color:#95CE24 "></small>
                                    <small class="fa fa-star" style="color:#95CE24 "></small>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap pb-4 m-n1">
                                <?php foreach($facilities as $index => $flt){?>
                                    <small class="bg-light rounded py-1 px-3 m-1" ><i class="bi bi-check-circle-fill me-2" style="color:#95CE24 "></i> 
                                        <?php echo($flt->discription)?>    
                                    </small>
                                <?php }?>    
                            </div>
                            <h6 style="font-weight: normal;"}>
                                <?php echo $model->discription ?>
                            </h6>
                        </div>        
                        <div class="col-lg-4">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <form>
                                    <div class="row g-3">
                                            <label for="name">Your Name</label>
                                            <div class="form-floating">
                                                <?php  echo $form->field($bookingModel, 'guest_name')->textInput(['value','class' => 'form-control'])->label(false)?>
                                            </div>       
                                            <label for="email">Your Email</label> 
                                            <div class="form-floating">      
                                                <?php  echo $form->field($bookingModel, 'email')->textInput(['value','class' => 'form-control'])->label(false)?>
                                            </div> 
                                            
                                            <label>Line ID</label> 
                                            <div class="form-floating">      
                                                <?php  echo $form->field($bookingModel, 'line')->textInput(['value','class' => 'form-control'])->label(false)?>
                                            </div> 

                                        <div class="col-12">
                                            <label for="message">Room</label>
                                            <div class="form-floating"> 

                                                <?php  
                                                echo Select2::widget([
                                                    'model' => $bookingModel,
                                                    'name' => 'room_id',
                                                    'attribute' => 'room_id',
                                                    'data' => $object,
                                                    'options' => [
                                                        'placeholder' => 'Select Rooms ...',
                                                        'multiple' => true
                                                    ],
                                                ]);
                                    
                                                ?>
                                                   
                                                    
                                  

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="message">Special Request</label>
                                            <div class="form-floating">
                           
                                                <?php  echo $form->field($bookingModel, 'request')->textArea(['maxlength' => 300, 'rows' => 6, 'cols' => 50,'placeholder'=>'Request.....'])->label(false)?>
                                             
                                            </div>
                                        </div>
                                        <?php 
                                            $dateFrom =  $bookingModel->dateFrom;
                                            $dateTo = $bookingModel->dateTo;
                                            $datediff = ( strtotime($dateTo)-strtotime($dateFrom)) / (60 * 60 * 24);
                                        ?>
                                        <div class="action">
                                            <?php 

                                                echo $form->field($bookingModel, 'room_type')->hiddenInput(['value'=>$model->type_id])->label(false);
                                                echo $form->field($bookingModel, 'price')->hiddenInput(['value'=>$model->price])->label(false);
                                                echo $form->field($bookingModel, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false);
                                                echo $form->field($bookingModel, 'quantity')->hiddenInput(['value'=>$datediff])->label(false);
                                                echo $form->field($bookingModel, 'dateFrom')->hiddenInput(['value'=> $bookingModel->dateFrom])->label(false);
                                                echo $form->field($bookingModel, 'dateTo')->hiddenInput(['value'=> $bookingModel->dateTo])->label(false);
                                                echo $form->field($bookingModel, 'cigarette_type')->hiddenInput(['value'=> $bookingModel->cigarette_type])->label(false);
                                                echo $form->field($bookingModel, 'status')->hiddenInput(['value'=> 'booked'])->label(false);
                                            ?>
                                            <?= Html::submitButton('Book Now', ['class' => 'btn btn-success w-100 py-3 rounded-pill']) ?>
                     
                                        </div>
                                    </div>
                                </form>
                            </div>
            


   

                        

                        </div> 
                        

                    </div>
                </div>
            </div>
    </div>
</div>
<?php ActiveForm::end(); ?>





        