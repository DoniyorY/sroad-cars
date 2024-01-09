<?php

namespace backend\controllers;

use common\models\SignupForm;
use common\models\User;
use common\models\search\UserSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'reset-pass' => ['post'],
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
                                'reset-pass',
                                'status',
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
     * Lists all User models.
     *
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            $model = new SignupForm();
            if ($model->load(\Yii::$app->request->post())) {

                if ($model->signup()) {
                    \Yii::$app->session->setFlash('success', 'Новый пользователь успешно добавлен');
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionResetPass($id)
    {
        $model = $this->findModel($id);
        $model->setPassword('123456');
        $model->updated_at = time();
        if ($model->update()) {
            \Yii::$app->session->setFlash('success', 'Пароль успешно сброшен!!!');
        } else {
            \Yii::$app->session->setFlash('danger', 'Ошибка при изменении пароля!!!');
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionStatus($id, $status)
    {
        $changed_code = 'changed_code';
        $model = $this->findModel($id);
        $model->status = $status;
        $model->updated_a = time();
        $model->update(false);
        \Yii::$app->session->setFlash('success', 'Статус успешно изменен');
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Displays a single User model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
