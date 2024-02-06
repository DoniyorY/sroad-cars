<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property $id int
 * @property $car_id int
 * @property $address_id int
 * @property $price int
 */
class Connector extends ActiveRecord
{

    public static function tableName()
    {
        return 'connector';
    }

    public function rules()
    {
        return [
            [['car_id', 'address_id', 'price'], 'integer'],
            [['car_id', 'address_id', 'price'], 'required'],
        ];
    }

    public function createConnector()
    {
        if (!$this->validate()) {
            return null;
        }
        $new = new Connector();
        $new->car_id = $this->car_id;
        $new->address_id = $this->address_id;
        $new->price = $this->price;
        $new->save();
    }

    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['id' => 'car_id']);
    }

}