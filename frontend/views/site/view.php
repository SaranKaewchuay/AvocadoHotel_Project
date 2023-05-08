<?php
use app\models\Facilities;
use app\models\RoomType;
use app\models\Booking;
use app\models\Rooms;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RoomType */

$this->title = $model->type_name;
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

/*$ac = Facilities::find()->where(["id" => $model->facilities])->all();*/

$type_room = roomType::find()->all();

$booked = Booking::find()->all();
//ArrayHelper::map(Rooms::find()->where(["type_id"=> $model->type_id])->all(), 'room_id', 'room_id'); 
foreach($booked as $b){
    var_dump($b);
}

?>


<?php $form = ActiveForm::begin(); ?>
    <div class="room-type-view">
        <div class="bg-white p-0">

            <div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.html"
                            class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="row gx-0 bg-white d-none d-lg-flex">
                            <div class="col-lg-7 px-5 text-start">
                                <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                    <i class="fa fa-envelope text-primary me-2"></i>
                                    <p class="mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="9cf5f2faf3dcf9e4fdf1ecf0f9b2fff3f1">[email&#160;protected]</a></p>
                                </div>
                                <div class="h-100 d-inline-flex align-items-center py-2">
                                    <i class="fa fa-phone-alt text-primary me-2"></i>
                                    <p class="mb-0">+012 345 6789</p>
                                </div>
                            </div>
                            <div class="col-lg-5 px-5 text-end">
                                <div class="d-inline-flex align-items-center py-2">
                                    <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="" href=""><i class="fab fa-youtube"></i></a>
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
                                <div class="navbar-nav mr-auto py-0">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Home</a>
                                        <div class="dropdown-menu fade-up rounded-0 m-0">
                                            <a href="home-1.html" class="dropdown-item">Home 1</a>
                                            <a href="home-2.html" class="dropdown-item">Home 2</a>
                                        </div>
                                    </div>
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                                        <div class="dropdown-menu fade-down rounded-0 m-0">
                                            <a href="about-1.html" class="dropdown-item">About 1</a>
                                            <a href="about-2.html" class="dropdown-item">About 2</a>
                                        </div>
                                    </div>
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Rooms</a>
                                        <div class="dropdown-menu fade-up rounded-0 m-0">
                                            <a href="room-grid.html" class="dropdown-item">Room Grid</a>
                                            <a href="room-list.html" class="dropdown-item">Room List</a>
                                            <a href="room-detail.html" class="dropdown-item">Room Detail</a>
                                        </div>
                                    </div>
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                        <div class="dropdown-menu fade-down rounded-0 m-0">
                                            <a href="service-1.html" class="dropdown-item">Service 1</a>
                                            <a href="service-2.html" class="dropdown-item">Service 2</a>
                                            <a href="service-detail.html" class="dropdown-item">Service Detail</a>
                                            <a href="blog-grid.html" class="dropdown-item">Blog Grid</a>
                                            <a href="blog-list.html" class="dropdown-item">Blog List</a>
                                            <a href="blog-detail.html" class="dropdown-item">Blog Detail</a>
                                            <a href="faq.html" class="dropdown-item">FAQs</a>
                                            <a href="gallery.html" class="dropdown-item">Gallery</a>
                                            <a href="contact.html" class="dropdown-item">Contact Us</a>
                                            <a href="booking-1.html" class="dropdown-item">Booking 1</a>
                                            <a href="booking-2.html" class="dropdown-item">Booking 2</a>
                                            <a href="team.html" class="dropdown-item">Our Team</a>
                                            <a href="testimonial-1.html" class="dropdown-item">Testimonial 1</a>
                                            <a href="testimonial-2.html" class="dropdown-item">Testimonial 2</a>
                                            <a href="404.html" class="dropdown-item">404</a>
                                        </div>
                                    </div>
                                    <a href="element.html" class="nav-item nav-link">Elements</a>
                                </div>
                                <a href="https://htmlcodex.com/hotel-html-template-pro"
                                    class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Purchase Now<i
                                        class="fa fa-arrow-right ms-3"></i></a>
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
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                               
                                <button class="carousel-control-prev" type="button" data-bs-target="#room-carousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#room-carousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
                                <div class="ps-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap pb-4 m-n1">
                                <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-bed text-primary me-2"></i>3
                                    Bed</small>
                                <small class="bg-light rounded py-1 px-3 m-1"><i class="fa fa-bath text-primary me-2"></i>2
                                    Bath</small>
                                <small class="bg-light rounded py-1 px-3 m-1"><i
                                        class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                <small class="bg-light rounded py-1 px-3 m-1"><i
                                        class="fa fa-tv text-primary me-2"></i>TV</small>
                                <small class="bg-light rounded py-1 px-3 m-1"><i
                                        class="fa fa-fan text-primary me-2"></i>AC</small>
                                <small class="bg-light rounded py-1 px-3 m-1"><i
                                        class="fa fa-user-cog text-primary me-2"></i>Laundry</small>
                                <small class="bg-light rounded py-1 px-3 m-1"><i
                                        class="fa fa-utensils text-primary me-2"></i>Dinner</small>
                            </div>
                            <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                                magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                                amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                                sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                                aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                                sit stet no diam kasd vero.
                            </p>
                            <p class="mb-5">Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam
                                dolores
                                vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                                nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                                ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                                clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                                justo dolore sit invidunt.
                            </p>
                
                        </div>        
                        <div class="col-lg-4">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                        
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name">Your Name</label>
                                            <div class="form-floating">
                                                <?php  echo $form->field($bookingModel, 'guest_name')->textInput(['value','class' => 'form-control'])->label(false)
                                            ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Your Email</label> 
                                            <div class="form-floating">      
                                                <?php  echo $form->field($bookingModel, 'email')->textInput(['value','class' => 'form-control'])->label(false)?>
                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="message">Check In</label>
                                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                                    <?php echo $form->field($bookingModel, 'dateFrom')->widget(
                                                        \yii\widgets\MaskedInput::class, [
                                                            'mask' => "1-2-y ",
                            
                                                            'clientOptions' => [
                                                                'alias' => 'datetime',
                                                                "placeholder" => "dd-mm-yyyy",
                                                                "separator" => "-"
                                                            ]
                                                        ]
                                                    )->label(false) ; $book = var_dump($bookingModel -> dateFrom);?>
                                            </div>
                                        </div>

                                
                                        <div class="col-md-6">
                                            <label for="message">Check Out</label>
                                            <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <?php echo $form->field($bookingModel, 'dateTo')->widget(
                                                        \yii\widgets\MaskedInput::class, [
                                                            'mask' => "1-2-y ",
                            
                                                            'clientOptions' => [
                                                                'alias' => 'datetime',
                                                                "placeholder" => "dd-mm-yyyy",
                                                                "separator" => "-"
                                                            ]
                                                        ]
                                                    )->label(false);?>
                            
                                            </div>
                                        </div>
                                                            
                                        <div class="col-12">
                                            <label for="message">Room</label>
                                            <div class="form-floating">
                        
                                            
                                                <?php $rooms = 
                                                ArrayHelper::map(Rooms::find()->where(["type_id"=> $model->type_id])->all(), 'room_id', 'room_id'); ?>
                                                <?= $form->field($bookingModel, 'room_id')->dropDownList(
                                                    $rooms,
                                                    [
                                                        'prompt'=>'Select Rooms',          
                                                    ]             
                                                )->label(false) ?>


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="message">Special Request</label>
                                            <div class="form-floating">
                           
                                                <?php  echo $form->field($bookingModel, 'request')->textInput(['maxlength' => 300, 'rows' => 6, 'cols' => 50,'placeholder'=>'Special Request.....'])->label(false)?>
                                             
                                            </div>
                                        </div>

                                        <div class="action">
                                            <?php 
                                                echo $form->field($bookingModel, 'room_type')->hiddenInput(['value'=>$type_id])->label(false);
                                                echo $form->field($bookingModel, 'price')->hiddenInput(['value'=>$model->price])->label(false);
                                                echo $form->field($bookingModel, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false);
                                                echo $form->field($bookingModel, 'quantity')->hiddenInput(['value'=>1])->label(false);
                                            ?>
                                            <?= Html::submitButton('Book Now', ['class' => 'btn btn-primary w-100 py-3 ']) ?>
                     
                                        </div>
                                    </div>
                              
                            </div>
            


                            <div class="bg-light p-4 mb-5 wow fadeInUp mt-3" data-wow-delay="0.1s">
                                <h4 class="section-title text-start mb-4">Category</h4>
                            
                                <a class="d-block position-relative mb-3" href="">
                                    <img class="img-fluid" src="..assets/img/cat-1.jpg" alt="">
                                    <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3"
                                        style="background: rgba(0,0,0,.3);">
                                        <h5 class="text-white m-0 mt-auto">luxury Room</h5>
                                    </div>
                                </a>
                                <a class="d-block position-relative mb-3" href="">
                                    <img class="img-fluid" src="..assets/img/cat-2.jpg" alt="">
                                    <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3"
                                        style="background: rgba(0,0,0,.3);">
                                        <h5 class="text-white m-0 mt-auto">Couple Room</h5>
                                    </div>
                                </a>
                                <a class="d-block position-relative" href="">
                                    <img class="img-fluid" src="..assets/img/cat-3.jpg" alt="">
                                    <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3"
                                        style="background: rgba(0,0,0,.3);">
                                        <h5 class="text-white m-0 mt-auto">Single Room</h5>
                                    </div>
                                </a>
                            </div>

                        

                        </div>
                        

                    </div>
                </div>
            </div>
    </div>
<?php ActiveForm::end(); ?>
