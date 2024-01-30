<?php

namespace frontend\controllers;

use common\models\Cars;
use yii\web\Controller;

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

}