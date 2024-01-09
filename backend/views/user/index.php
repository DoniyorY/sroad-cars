<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main"><a href="<?= Yii::$app->homeUrl ?>">Гланая</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <?php if (Yii::$app->session->hasFlash('warning')): ?>
            <div class="alert alert-warning alert-dismissible bg-warning text-white alert-label-icon fade show"
                 role="alert">
                <i class="ri-alert-line label-icon"></i><strong>ВНИМАНИЕ!!!</strong> <?= Yii::$app->session->getFlash('warning') ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-secondary alert-dismissible bg-success text-white alert-label-icon fade show"
                 role="alert">
                <i class="ri-check-double-line label-icon"></i><strong>Успешно!!!</strong>
                <?= Yii::$app->session->getFlash('success') ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <!-- Default Modals -->
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#createUserModal">
                Добавить
            </button>
        </div>
    </div>
    <div id="createUserModal" class="modal flip fade" tabindex="-1" aria-labelledby="createUserModalLabel"
         aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Добавить нового сотрудника</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= $this->render('_form', ['model' => new \common\models\SignupForm()]) ?>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'fullname',
            'phone',
            'role_id',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            [
                'attribute' => 'created_at',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created_at);
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    if ($data->status == 10) {
                        return Html::a(Yii::$app->params['user_status'][$data->status], ['status', 'id' => $data->id, 'status' => 9], [
                            'class' => 'btn btn-sm btn-success w-100',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Подтвердите действие!!!',
                            ]
                        ]);
                    } else {
                        return Html::a(Yii::$app->params['user_status'][$data->status], ['status', 'id' => $data->id, 'status' => 10], [
                            'class' => 'btn btn-sm btn-danger w-100',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Подтвердите действие!!!',
                            ]
                        ]);
                    }
                },
                'format' => 'raw',
            ],
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template'=>'{view}'
            ],
        ],
    ]); ?>

</div>
