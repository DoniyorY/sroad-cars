<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_type".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_uz
 * @property string|null $icon
 */
class CarType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en', 'name_uz'], 'required'],
            [['name_ru', 'name_en', 'name_uz', 'icon'], 'string', 'max' => 255],
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
            'icon' => 'Логотип',
        ];
    }
}
