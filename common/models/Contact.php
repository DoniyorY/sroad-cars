<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int $status
 * @property int $created
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'phone', 'email', 'subject', 'message', 'status', 'created'], 'required'],
            [['message'], 'string'],
            [['status', 'created'], 'integer'],
            [['fullname', 'phone', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Ф.И.О',
            'phone' => 'Номер телефона',
            'email' => 'Почта',
            'subject' => 'Тема',
            'message' => 'Сообщение',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }
}
