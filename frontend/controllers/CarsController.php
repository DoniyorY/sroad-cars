<?php

namespace frontend\controllers;

use common\models\Address;
use common\models\Cars;
use yii\web\Controller;
use yii\web\Response;

class CarsController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id = null)
    {
        $model = Cars::findOne(['id' => $id]);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionAjax($search_type)
    {
        $this->response->format = Response::FORMAT_JSON;
        if ($search_type == 0) {
            $model = Address::findAll(['category_id' => 0]);
        } else {
            $model = Address::findAll(['category_id' => 1]);
        }
        return $model;
    }

}