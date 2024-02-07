<?php

namespace common\models\search;

use common\models\Connector;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ConnectorSearch extends Connector
{
    public function rules()
    {
        return [
            [['to_id','car_id','people_count'], 'integer'],
            ['title', 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function filter($params)
    {
        $query = Connector::find()->joinWith('car');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'address_id' => $this->to_id,
            'car_id' => $this->car_id,
            'cars.capacity' => $this->people_count,
        ]);
        $query->orFilterWhere(['like', 'name_ru', $this->title])
            ->orFilterWhere(['like', 'name_en', $this->title])
            ->orFilterWhere(['like', 'name_uz', $this->title]);

        return $dataProvider;
    }
}