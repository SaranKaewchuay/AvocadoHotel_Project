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
            [['room_id', 'type_id', 'cigarette_type'], 'safe']
        ];
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
