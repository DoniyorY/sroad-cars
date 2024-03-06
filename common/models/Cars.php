<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property int $manufacture_id
 * @property int $category_id
 * @property int $type_id
 * @property int $created
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $content_uz
 * @property int $status
 * @property int $price
 * @property int $capacity
 * @property int $baggage
 * @property string $short_ru
 * @property string $short_en
 * @property string $short_uz
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manufacture_id', 'category_id', 'type_id', 'created', 'name_ru', 'name_en', 'name_uz', 'content_ru', 'content_en', 'content_uz', 'status', 'price', 'capacity', 'baggage'], 'required'],
            [['manufacture_id', 'category_id', 'type_id', 'created', 'status', 'price', 'capacity', 'baggage'], 'integer'],
            [['content_ru', 'content_en', 'content_uz'], 'string'],
            [['name_ru', 'name_en', 'name_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manufacture_id' => 'Марка',
            'category_id' => 'Категория',
            'type_id' => 'Тип',
            'created' => 'Дата создания',
            'name_ru' => 'Название на русском',
            'name_en' => 'Название на английском',
            'name_uz' => 'Название на узбекском',
            'content_ru' => 'Контент на русском',
            'content_en' => 'Контент на английском',
            'content_uz' => 'Контент на узбекском',
            'status' => 'Статус',
            'price' => 'Цена',
            'capacity' => 'Вмещаемость',
            'baggage' => 'Багаж',
            'short_ru'=>'короткое описание на русском',
            'short_en'=>'Короткое описание на английском',
            'short_uz'=>'Короткое описание на узбекском'
        ];
    }

    public function fields()
    {
        return [
            'id',
            'text' => function ($data) {
                return $data->category->{'name_'.Yii::$app->language} . ' ' .$data->{'name_' . Yii::$app->language};
            }
        ];
    }

    public function getManufacture()
    {
        return $this->hasOne(CarManufacturer::className(), ['id' => 'manufacture_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(CarCategory::className(), ['id' => 'category_id']);
    }

    public function getType()
    {
        return $this->hasOne(CarType::className(), ['id' => 'type_id']);
    }

}
