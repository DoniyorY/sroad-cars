<?php

namespace frontend\controllers;

use yii\web\Controller;

class CarsController extends Controller
{

    public function actionIndex()
    {

        return $this->render('index');
    }

}