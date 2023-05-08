<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "rooms".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $room_id
 * @property mixed $type_id
 * @property mixed $cigarette_type
 */

class Rooms extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'room_id',
            'type_id',
            'cigarette_type',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        
        return [
            [['room_id', 'type_id', 'cigarette_type'], 'safe'],

            [['room_id'], 'checkRoom'],
            /*['room_id', 'required', 'when' => function($rooms) {
                $check=0;
                foreach ($rooms as $index => $room_num){
                    if($room_num->room_id == room_id){
                        $check=1;
                    }
                }
                if($check == 1){
                    return false;
                }
                else{
                    return true;
                }
                
            }]*/
        
        ];
    }

    public function checkRoom($attribute,$params){
        $rooms = Rooms::find()->all();
        $check=0;
                foreach ($rooms as $index => $room_num){
                    if($room_num->room_id == $this->room_id){
                        $check=1;
                    }
                }
                if($check == 1){
                    $this->addError($attribute,' *Duplicate Room Number');
                }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'room_id' => 'Room ID',
            'type_id' => 'Type ID',
            'cigarette_type' => 'Cigarette Type',
        ];
    }
    public function getTableSchema(){
        return false;
    }
    
}

