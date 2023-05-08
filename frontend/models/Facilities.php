<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "facilities".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $id
 * @property mixed $discription
 */
class Facilities extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'facilities';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'id',
            'discription',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'discription'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'id' => 'Id',
            'discription' => 'Discription',
        ];
    }
    public function getTableSchema(){
        return false;
    }

}
