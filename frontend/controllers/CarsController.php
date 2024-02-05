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



}