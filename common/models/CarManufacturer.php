<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_manufacturer".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_uz
 * @property string|null $image
 */
class CarManufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_manufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['name_ru', 'name_en', 'name_uz'], 'required'],
            [['name_ru', 'name_en', 'name_uz', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название на русском',
            'name_en' => 'Название на английском',
            'name_uz' => 'Название на узбекском',
            'image' => 'Image',
        ];
    }
}
