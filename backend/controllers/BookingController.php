<?php

namespace backend\controllers;

use common\models\Booking;
use common\models\search\BookingSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'status' => ['post'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => [
                                'index',
                                'view',
                                'status',
                                'delete',
                                'create-test',
                            ],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function actionCreateTest()
    {
        $model = new Booking();
        $model->created = time();
        $model->fullname = 'test';
        $model->phone = '998995993603';
        $model->status = 0;
        $model->booking_date = time();
        $model->booking_time = time();
        $model->cars_id = 1;
        $model->from_id = 1;
        $model->to_id = 2;
        $model->email = 'test@email.com';
        $model->save(false);
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Lists all Booking models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->status == 0) {
            $model->status = 1;
            $model->update(false);
            \Yii::$app->session->setFlash('success', 'Статус изменен: В рассмотрении');
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionStatus($id, $status)
    {
        $model = $this->findModel($id);
        $model->status = $status;
        $model->update(false);
        \Yii::$app->session->setFlash('success', 'Статус изменен: ' . \Yii::$app->params['booking_status'][$status]);
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
