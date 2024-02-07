<?php

namespace common\models\search;

use common\models\Connector;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `common\models\Cars`.
 */
class CarsSearch extends Cars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'manufacture_id', 'category_id', 'type_id', 'created', 'status', 'price', 'capacity', 'baggage'], 'integer'],
            [['name_ru', 'name_en', 'name_uz', 'content_ru', 'content_en', 'content_uz'], 'safe'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cars::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'manufacture_id' => $this->manufacture_id,
            'category_id' => $this->category_id,
            'type_id' => $this->type_id,
            'created' => $this->created,
            'status' => $this->status,
            'price' => $this->price,
            'capacity' => $this->capacity,
            'baggage' => $this->baggage,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'content_uz', $this->content_uz]);

        return $dataProvider;
    }


}
