<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Contact $model */

$this->title = $model->fullname;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-view">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main"><a href="<?= Yii::$app->homeUrl ?>">Гланая</a></li>
                        <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['index']) ?>">Контакты</a></li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php if (\Yii::$app->session->hasFlash('success')):?>
        <!-- Secondary Alert -->
        <div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i> <?=Yii::$app->session->getFlash('success')?>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group">
                <?php
                if ($model->status == 1) {
                    echo Html::a('Завершить', ['complete', 'id' => $model->id], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                            'confirm' => 'Подтвердите действие',
                        ]
                    ]);
                }
                echo Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger ',
                    'data' => [
                        'confirm' => 'Подтвердите действие',
                        'method' => 'post',
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'phone',
            'email:email',
            'subject',
            'message:ntext',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Yii::$app->params['contact_status'][$data->status];
                }
            ],
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
        ],
    ]) ?>

</div>
