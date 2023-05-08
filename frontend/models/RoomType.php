<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "roomType".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $type_id
 * @property mixed $type_name
 * @property mixed $img_url
 * @property mixed $discription
 * @property mixed $price
 * @property mixed $capacity
 * @property mixed $facilities
 */
class RoomType extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'roomType';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'type_id',
            'type_name',
            'img_url',
            'discription',
            'price',
            'capacity',
            'facilities',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'type_name', 'img_url', 'discription', 'price', 'capacity', 'facilities'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'img_url' => 'Img Url',
            'discription' => 'Discription',
            'price' => 'Price',
            'capacity' => 'Capacity',
            'facilities' => 'Facilities',
        ];
    }
    public function getTableSchema(){
        return false;
    }

}
