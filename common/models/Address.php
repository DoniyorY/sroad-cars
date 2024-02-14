<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_uz
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name_ru', 'name_en', 'name_uz'], 'required'],
            [['category_id'], 'integer'],
            [['name_ru', 'name_en', 'name_uz'], 'string', 'max' => 255],
        ];
    }

    public function fields()
    {
        return array(
            'id',
            'text' => function ($data) {
                return $data->{'name_' . Yii::$app->language};
            },
        );

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name_ru' => 'Название на русском',
            'name_en' => 'Название на английском',
            'name_uz' => 'Название на узбекском',
        ];
    }
}
