<?php

namespace app\modules\api\controllers;

use common\models\Address;
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
    public function actionAjax($search_type)
    {
        $this->response->format = Response::FORMAT_JSON;
        if ($search_type == 0) {
            $model = Address::findAll(['category_id' => 0]);
        } else {
            $model = Address::findAll(['category_id' => 1]);
        }
        return [
            'address' => $model,
        ];
    }
}
