<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->fullname;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main"><a href="<?= Yii::$app->homeUrl ?>">Гланая</a>
                        </li>
                        <li class="breadcrumb-item" data-key="t-users"><a href="<?= \yii\helpers\Url::to(['index']) ?>">Пользователи</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <?php if (Yii::$app->session->hasFlash('danger')): ?>
            <div class="alert alert-warning alert-dismissible bg-warning text-white alert-label-icon fade show"
                 role="alert">
                <i class="ri-alert-line label-icon"></i><strong>Ошибка!!!</strong> <?= Yii::$app->session->getFlash('danger') ?>
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
        <div class="col-md-12 text-end mb-2">
            <div class="btn-group">
                <!-- Default Modals -->
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#updateUser">
                    Редактировать
                </button>
                <?php
                echo Html::a('Сбросить пароль', ['reset-pass', 'id' => $model->id], [
                    'class' => 'btn btn-info',
                    'data' => [
                        'method' => 'post',
                        'confirm' => 'Подтвердите действие',
                    ]
                ]);
                if ($model->status == 10) {
                    echo Html::a('Отключить', ['status', 'id' => $model->id, 'status' => 9], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'method' => 'post',
                            'confirm' => 'Подтвердите действие'
                        ]
                    ]);
                } else {
                    echo Html::a('Включить', ['status', 'id' => $model->id, 'status' => 10], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                            'confirm' => 'Подтвердите действие'
                        ]
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
    <div id="updateUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Редактировать: <?= $model->fullname ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php $form = ActiveForm::begin(['action' => Url::to(['update', 'id' => $model->id])]) ?>
                <div class="modal-body">
                    <?= $form->field($model, 'phone')->textInput(['type' => 'number', 'value' => $model->phone]) ?>
                    <?= $form->field($model, 'role_id')->dropDownList(Yii::$app->params['user_role'], ['value' => $model->role_id]) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary ">Сохранить</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'fullname',
            'phone',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Yii::$app->params['user_status'][$data->status];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($d) {
                    return date('d.m.Y', $d->created_at);
                }
            ],
            //'verification_token',
            [
                'attribute' => 'role_id',
                'value' => function ($data) {
                    return Yii::$app->params['user_role'][$data->role_id];
                }
            ],
        ],
    ]) ?>

</div>
