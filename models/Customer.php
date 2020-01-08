<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Class Customer
 * @package app\models
 * @property int $id
 * @property int $address_id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $created_at
 * @property string $email
 */
class Customer extends ActiveRecord
{
    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';
    const GENDER_UNDEFINED = 'Undefined';

    public static function tableName()
    {
        return 'customer';
    }

    public function getAddress()
    {
        return $this->hasMany(Address::className(), ['customer_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['login', 'password', 'first_name', 'last_name', 'gender', 'email'], 'required'],
            [['gender'], 'string'],
            [['login', 'password', 'first_name', 'last_name', 'email'], 'string', 'max' => 255],
            [['login', 'email'], 'unique'],
            [ 'login', 'string', 'min' => 4 ],
            [ 'password', 'string', 'min' => 6 ],
            [['first_name','last_name'],'match', 'pattern'=>'/^([A-Z]+[a-z]{2,20})|([А-ЯЁ]+[а-яё]{2,20})$/', 'message' => 'The first letter must be uppercase.'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Login',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'email' => 'Email',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getGender()
    {
        return [
            self::GENDER_MALE => 'Male',
            self::GENDER_FEMALE => 'Female',
            self::GENDER_UNDEFINED => 'Undefined'
        ];
    }
}