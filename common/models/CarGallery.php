<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_gallery".
 *
 * @property int $id
 * @property int $cars_id
 * @property string $image
 */
class CarGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_gallery';
    }

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cars_id', 'image'], 'required'],
            [['cars_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            ['imageFile', 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, jpeg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cars_id' => 'Cars ID',
            'image' => 'Image',
        ];
    }

    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'cars_id']);
    }
}
