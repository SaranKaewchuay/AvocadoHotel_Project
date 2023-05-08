<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "profiles".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $user_id
 * @property mixed $firstname
 * @property mixed $lastname
 * @property mixed $email
 * @property mixed $telephone
 * @property mixed $img_url
 */
class Profiles extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'user_id',
            'firstname',
            'lastname',
            'email',
            'telephone',
            'img_url',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','firstname', 'lastname', 'email', 'telephone', 'img_url'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'user_id' => 'User_id',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'img_url' => 'Image',
        ];
    }
    public function getTableSchema(){
        return false;
    }
}
