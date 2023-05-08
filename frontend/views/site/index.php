<?php

/** @var yii\web\View $this */
use app\models\Booking;
use app\models\RoomType;
use yii\helpers\ArrayHelper;
use app\models\Facilities;
$this->title = 'Avocado Hotel';

$type_room = roomType::find()->all();

?>
<div class="site-index">
<div class="bg-white p-0 mt-3">
        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="#contact" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
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
                            <h1 class="m-0 text-primary text-uppercase">Avocado</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                
                            <a href="#contact" class="btn btn-success rounded-0 py-4 px-md-5 d-none d-lg-block">Contacts<i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                    </nav>
                
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                    <div class="carousel-item active">
                        <img class="w-100" src="https://www.fontainebleau.com/fontainebleau/146/1/hotel.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="#ourRoom" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="#ourRoom" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="https://ak-d.tripcdn.com/images/20010i0000009cpgw244A_Z_1100_824_R5_Q70_D.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="#ourRoom" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="#ourRoom" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
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
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
   
                        <h1 class="mb-5 section-title ">About  <span class="text-uppercase" style="color: #95CE24 ">US</span></h1>
                    </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                       
                        <div class="row ">
                            <div class="col-6 align-self-center">
                                 <h1 class="mb-4 text-center" style="font-size: 75px">Welcome <br>to <!--<span class="text-uppercase" style="color:#95CE24">Avocado</span>--></h1> 
                            </div>
                            <div class="col-5 ml-5">
                                <img src="../assets/img/avocado.png" width="400" height="340"alt="">
                            </div>
                        </div>
                        <br>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-success mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">30</h2>
                                        <p class="mb-0">Rooms</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-success mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">10</h2>
                                        <p class="mb-0">Staffs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-success mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">100</h2>
                                        <p class="mb-0">Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="../assets/img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="../assets/img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="../assets/img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="../assets/img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <a id="ourRoom">
        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title text-center text-uppercase" style="color:#1A990D">Our Rooms</h6>
                        <h1 class="mb-5">Explore Our <span class="text-uppercase" style="color: #95CE24 ">Rooms</span></h1>
                    </div>

                <div class="row g-4">
                    <?php foreach ($type_room as $index => $model){ ?>
                        
                        
                        <?php 
                            
                            $img = explode(",",$model->img_url);
                            //var_dump($img);
                            $facilities = ArrayHelper::map(Facilities::find()->where(["id"=> $model->facilities])->all(), 'id', 'discription'); 
                            //var_dump($facilities);

                            /*$booking = Booking::find()->where(["room_type"=> $model-> _id])->all();
                            var_dump($booking)*/
                        ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="<?=$img[0]?>" alt="">
                                    <small class="position-absolute start-0 top-100 translate-middle-y bg-success text-white rounded-pill py-1 px-3 ms-4">$<?=$model->price?> / Night</small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0"><?=$model->type_name?></h5>
                                        <div class="ps-2">
                                            <!-- <small class="fa fa-star" style="color: #95CE24 "></small> -->
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                    <?php $i=0 ?>
                                    <small class="border-end me-3 pe-3"></small>
                                    <?php foreach($facilities as $flt){?>
                                        <?php if($i==3){?>
                                        
                                        <?php break ;}?>
                                        <small class="border-end me-3 pe-3"><i class="bi bi-check-circle-fill  me-2" style="color: #95CE24 "></i>
                                        <?php echo $flt ?>
                                        </small>
                                    <?php  $i+= 1; }?>
                                    </div>
                                    <p class="text-body mb-3"><?=$model->discription?></p>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-sm btn-success rounded-pill py-2 px-4" href="index.php?r=room-type/view&_id=<?=$model->_id?>">View Detail</a>
                                        <a class="btn btn-sm btn-dark rounded-pill py-2 px-4" href="index.php?r=room-type/view&_id=<?=$model->_id?>">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Room End -->
        

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <a id="contact" >
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title text-center text-uppercase" style="color:#1A990D">Contacts</h6>
                        <h1 class="mb-5">Explore Our <span class="text-uppercase" style="color: #95CE24 ">Contacts</span></h1>
                    </div>
        <br><br><br><br>
        </a>
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-5">
                    <iframe class="ml-4" 
                        width="400"
                        height="290"
                        style="border:0"
                        loading="lazy"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8071.622014484443!2d99.89188023679671!3d8.636050934854891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3053a1a7a665445b%3A0x91eb08ca9e070c5!2z4Lir4LiZ4Liz4LmA4LiE4Li14Lii4LiH4LiU4Liy4Lin!5e0!3m2!1sth!2sth!4v1665541368297!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>   
                
                <div class="col-5">
                    <h7>
                     <b>Address:</b> 17/4 Moo.5, Bamroongrat Road, Tambon Pibulsongkram, Amphur Muang, Chiang Rai, 51000 
                     <br><br>
                     <b>Phone:</b> 089 873 4906
                     <br><br>
                     <b>email:</b> avocado_hotel@gmail.com
                     <br><br>
                     <b>Facebook:</b> Avocado Hotel
                     <br><br>
                     <b>Line:</b> avocado_hotel
                     
                    </h7>
                </div>   
            </div> 
        </div>  
        <br><br><br><br>                            
    </div>
</body>
</div>
