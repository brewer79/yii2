<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Address extends ActiveRecord
{
    public static function tableName()
    {
        return 'address';
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function rules()
    {
        return [
            [['customer_id', 'postal_code', 'country', 'city', 'street', 'building'], 'required'],
            [['customer_id', 'postal_code'], 'integer'],
            [['building', 'apartment'], 'string', 'max' => 10],
            [['city', 'street'], 'string', 'max' => 255],
            [['apartment'], 'trim'],
            ['country','match', 'pattern'=>'/^([A-Z]{2,2})|([А-ЯЁ]{2,2})$/', 'message' => '2-letter code, upper case only.'],
            ['postal_code', 'match', 'pattern'=>'/[0-9]/'],
            [ 'country', 'string', 'length' => [2,2] ],

        ];
    }

    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'postal_code' => 'Postal Code',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'building' => 'Building',
            'apartment' => 'Apartment',
        ];
    }
}
