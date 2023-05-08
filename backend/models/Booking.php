<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "booking".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $guest_name
 * @property mixed $email
 * @property mixed $line
 * @property mixed $room_id
 * @property mixed $request
 * @property mixed $room_type
 * @property mixed $price
 * @property mixed $user_id
 * @property mixed $quantity
 * @property mixed $dateFrom
 * @property mixed $dateTo
 * @property mixed $cigarette_type
 * @property mixed $email
 * @property mixed $status
 */
class Booking extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'guest_name',
            'email',
            'line',
            'room_id',
            'request',
            'room_type',
            'price',
            'user_id',
            'quantity',
            'dateFrom',
            'dateTo',
            'cigarette_type',
            'email',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'email', 'line', 'room_id', 'request', 'room_type', 'price', 'user_id', 'quantity', 'dateFrom', 'dateTo', 'cigarette_type', 'email', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'guest_name' => 'Guest Name',
            'email' => 'Email',
            'line' => 'Line',
            'room_id' => 'Room ID',
            'request' => 'Request',
            'room_type' => 'Room Type',
            'price' => 'Price',
            'user_id' => 'User ID',
            'quantity' => 'Quantity',
            'dateFrom' => 'Date From',
            'dateTo' => 'Date To',
            'cigarette_type' => 'Cigarette Type',
            'status' => 'Status',
        ];
    }
    public function getTableSchema(){
        return false;
    }
}
