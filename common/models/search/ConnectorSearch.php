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
            [['to_id', 'car_id', 'people_count',], 'integer'],
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
        $query = Connector::find()->joinWith('car')->groupBy('car_id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //$get = $params['CarsSearch'];
        $this->load($params);
        // grid filtering conditions
        $query->andFilterWhere([
            'address_id' => $this->to_id,
            'car_id' => $this->car_id,
        ]);

        $query->andFilterWhere(['>=', 'cars.capacity', $this->people_count]);
        return $dataProvider;
    }
}