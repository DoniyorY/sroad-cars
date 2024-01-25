<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $created
 * @property int $status
 * @property int $cars_id
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property int $from_id
 * @property int $to_id
 * @property int $booking_date
 * @property string $booking_time
 * @property string $airport_content
 * @property string $content
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'status', 'cars_id', 'fullname', 'email', 'phone', 'from_id', 'to_id', 'booking_date', 'booking_time'], 'required'],
            [['created', 'status', 'cars_id', 'from_id', 'to_id', 'booking_date'], 'integer'],
            [['fullname', 'email', 'phone', 'booking_time', 'airport_content', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created' => 'Дата создания',
            'status' => 'Статус',
            'cars_id' => 'Машина',
            'fullname' => 'Ф.И.О',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'from_id' => 'Адрес От',
            'to_id' => 'Адрес куда',
            'booking_date' => 'Дата заказа',
            'booking_time' => 'Время заказа',
            'airport_content' => 'Номер рейса',
            'content' => 'Примечание',
        ];
    }

    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'cars_id']);
    }

    public function getFrom()
    {
        return $this->hasOne(Address::className(), ['id' => 'from_id']);
    }

    public function getTo()
    {
        return $this->hasOne(Address::className(), ['id' => 'to_id']);
    }
}
