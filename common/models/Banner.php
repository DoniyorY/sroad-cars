<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_uz
 * @property string $image
 * @property int $status
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['name_ru', 'name_en', 'name_uz', 'title_ru', 'title_en', 'title_uz', 'image', 'status'], 'required'],
            [['status'], 'integer'],
            [['name_ru', 'name_en', 'name_uz', 'title_ru', 'title_en', 'title_uz', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'jpg, jpeg, png', 'skipOnEmpty' => true],
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
            'title_ru' => 'Заголовок на русском',
            'title_en' => 'Заголовок на английском',
            'title_uz' => 'Заголовок на узбекском',
            'image' => 'Изображение',
            'status' => 'Статус',
        ];
    }
}
