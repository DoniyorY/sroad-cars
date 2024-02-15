<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cars_owl".
 *
 * @property int $id
 * @property int $car_id
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $content_uz
 * @property string $image
 */
class CarsOwl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars_owl';
    }

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'title_ru', 'title_en', 'title_uz', 'content_ru', 'content_en', 'content_uz', 'image'], 'required'],
            [['car_id'], 'integer'],
            [['content_ru', 'content_en', 'content_uz'], 'string'],
            [['title_ru', 'title_en', 'title_uz', 'image'], 'string', 'max' => 255],
            ['imageFile', 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'title_ru' => 'Заголовок на русском',
            'title_en' => 'Заголовок на английском',
            'title_uz' => 'Заголовок на узбекском',
            'content_ru' => 'Контент на русском',
            'content_en' => 'Контент на английском',
            'content_uz' => 'Контент на узбекском',
            'image' => 'Изображение',
            'imageFile' => 'Изображение',
        ];
    }
}
