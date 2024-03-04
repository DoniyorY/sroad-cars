<?php

namespace app\modules\api\controllers;

use common\models\Address;
use common\models\Cars;
use common\models\Connector;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Default controller for the `api` module
 */
class ApiController extends ActiveController
{
    public $modelClass = 'common\models\Address';

    /**
     * Renders the index view for the module
     * @return array|string
     */
    public function actionAjax($search_type, $req = false, $address_id = null)
    {
        $this->response->format = Response::FORMAT_JSON;
        $query = Address::find();
        $model = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($req) {
            $query->orFilterWhere(['like', 'name_ru', $req])
                ->orFilterWhere(['like', 'name_en', $req])
                ->orFilterWhere(['like', 'name_uz', $req]);
        }

        if ($search_type == 0) {
            $query->andFilterWhere(['category_id' => 0]);
        }
        if ($search_type == 1) {
            $query->andFilterWhere(['category_id' => 1]);
            if ($address_id == 4 or $address_id == 1) {
                $query->andFilterWhere(['like', 'name_ru', 'Отель']);
            } else {
                $query->andFilterWhere(['between', 'id', 5, 10]);
            }
        }

        return $model->getModels();
    }

    public function actionFindCar($data = null)
    {
        $this->response->format = Response::FORMAT_JSON;
        $query = Cars::find()->andFilterWhere(['status' => 0]);
        $model = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->orFilterWhere(['like', 'name_ru', $data])
            ->orFilterWhere(['like', 'name_en', $data])
            ->orFilterWhere(['like', 'name_uz', $data]);


        return $model->getModels();
    }

    public function actionSelected($address_id, $car_id)
    {
        $model = Connector::findOne(['address_id' => $address_id, 'car_id' => $car_id]);
        return $model->price; // \Yii::$app->formatter->asDecimal($model->price, 0) . ' UZS';
    }
}
