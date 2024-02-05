<?php

namespace app\modules\api\controllers;

use common\models\Address;
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
    public function actionAjax($search_type, $req = false)
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
        } else {
            $query->andFilterWhere(['category_id' => 1]);
        }

        return $model->getModels();
    }
}
