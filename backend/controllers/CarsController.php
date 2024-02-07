<?php

namespace backend\controllers;

use common\models\CarGallery;
use common\models\Cars;
use common\models\Connector;
use common\models\search\CarsSearch;
use common\models\UploadsImage;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller
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
                        'delete-address' => ['post'],
                        'delete-photo' => ['post'],
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
                                'update',
                                'delete',
                                'status',
                                'create',
                                'create-address',
                                'add-photo',
                                'delete-address',
                                'delete-photo',
                            ],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cars models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cars model.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $gallery = CarGallery::findAll(['cars_id' => $model->id]);
        $photo = new CarGallery();
        $connector = new Connector();
        $show_conn = Connector::findAll(['car_id' => $id]);
        if ($this->request->isPost) {
            if ($photo->load(\Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($photo, 'imageFile');
                $upload = UploadsImage::uploadImage($photo, $file, 'cars');
                if ($upload) {
                    $photo->image = $upload;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
                $photo->save();
                return $this->redirect(\Yii::$app->request->referrer);
            }
        }


        return $this->render('view', [
            'model' => $model,
            'photo' => $photo,
            'gallery' => $gallery,
            'connect' => $connector,
            'show_conn' => $show_conn,
        ]);
    }

    public function actionCreateAddress()
    {
        $model = new Connector();
        if ($model->load(\Yii::$app->request->post()) and $model->createConnector()) {
            \Yii::$app->session->setFlash('success');
            return $this->redirect(\Yii::$app->request->referrer);
        } else {
            \Yii::$app->session->setFlash('danger');
            return $this->redirect(\Yii::$app->request->referrer);
        }
    }

    public function actionDeleteAddress($id)
    {
        $model = Connector::findOne(['id' => $id]);
        $model->delete();
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionDeletePhoto($id)
    {
        $model = CarGallery::findOne(['id' => $id]);
        $model->delete();
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionStatus($id, $status)
    {
        $model = $this->findModel($id);
        $model->status = $status;
        $model->update(false);
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cars();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created = time();
                $model->status = 0;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cars model.
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
     * Deletes an existing Cars model.
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
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cars::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
