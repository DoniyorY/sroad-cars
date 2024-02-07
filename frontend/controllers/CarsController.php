<?php

namespace frontend\controllers;

use common\models\search\CarsSearch;
use common\models\Cars;
use common\models\search\ConnectorSearch;
use yii\web\Controller;

class CarsController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new ConnectorSearch();
        $dataProvider = $searchModel->filter($this->request->queryParams);
        return $this->render('index', [
            'model' => $dataProvider->getModels(),
        ]);
    }

    public function actionView($id = null)
    {
        $model = Cars::findOne(['id' => $id]);

        return $this->render('view', [
            'model' => $model,
        ]);
    }


}