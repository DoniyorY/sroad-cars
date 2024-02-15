<?php

namespace frontend\controllers;

use common\models\Booking;
use common\models\CarGallery;
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

    public function actionBooking()
    {
        $model = new Booking();
        if ($model->load(\Yii::$app->request->post())) {
            $model->booking_date = strtotime($model->booking_date);
            $model->booking_time = strtotime($model->booking_time);
            $model->created = time();
            $model->price=$_POST['Booking']['price'];
            $model->save(false);
            \Yii::$app->session->setFlash('success', \Yii::$app->params['success_alert'][\Yii::$app->language]);
            return $this->redirect(\Yii::$app->request->referrer);
            /*echo "<pre>";
            print_r($_POST);
            die();*/
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = Cars::findOne(['id' => $id]);
        $photo = CarGallery::findOne(['cars_id' => $id, 'type_id' => 0]);

        return $this->render('view', [
            'model' => $model,
            'photo' => $photo
        ]);
    }


}