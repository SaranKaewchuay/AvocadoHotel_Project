<?php 




$facilities= Facilities::find()->where(["id" => $model-> facilities])->all();

// ArrayHelper::map(Rooms::find()->where(["type_id"=> $model->type_id])->all(), 'room_id', 'room_id');

// $booking = ArrayHelper::map(Booking::find()->all(), 'room_type', $model->type_id);
$booked = Booking::find()->all();

// $i=0;
// foreach($booked as $b){
//     var_dump("a = >", $b->room_type ,$b->room_id) ;
// }

$roomType = RoomType::find()->where(["_id" => $booked[0]-> room_type])->all();
$booked = Booking::find()->all();
// $booked = Booking::find()->where(["room_type" => $model->_id ])->all();

//var_dump($roomType);
//var_dump($model->_id);
$room = ArrayHelper::map(Rooms::find()->where(["room_id"=> $model->room_id])->all(), 'room_id', 'room_id'); 
var_dump($room);
// foreach($booked as $b){
    
//     $booking = Booking::find()->where(["room_type" => $model->_id ])->all();
//     var_dump($booking);
// }


// $model = User::find()
//     ->select(['id','username','first_name','last_name','image','year','city'])
//     ->where(['IN','id',$userFiltr])
//     ->asArray()->all();
    
// $test = Facilities::find()->where(["id" => $model-> facilities])->all();


// var_dump("Room Type",$model->_id);

// foreach ($booked as $m){ 
//     var_dump($m);
// }
/*foreach($booking as $b){    
    var_dump($b->dateFrom);
}*/

//$booked_list = ArrayHelper::map(Booking::find()->where(["room_type"=> $model-> _id])->all(), 'room_id', 'room_id');

/*$booked = $booked_list ::map(Booking::find()
       ->andWhere(["room_type"=> $model-> _id])
       ->orWhere(['and',
           ['dateFrom'=>$model->dateFrom >= 'bkin'],
           ['dateFrom'=>$model->dateFrom < 'bkout']
       ]))->all();*/


//var_dump($booked)
//var_dump($booking)
//var_dump($facilities);
//$type_room = roomType::find()->all();
//$room_num = Rooms::find()->where(["type_id"=> $model->type_id])->all();
//var_dump($room_num );













?>