<?php

use common\models\Contact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ContactSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contact-index">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main"><a href="<?= Yii::$app->homeUrl ?>">Гланая</a></li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <a href="<?= Url::to(['check-all']) ?>" data-method="post" class="btn btn-primary w-100">Отметить как прочитанное</a>
        </div>
    </div>
    <?php if (\Yii::$app->session->hasFlash('success')):?>
        <!-- Secondary Alert -->
        <div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i> <?=Yii::$app->session->getFlash('success')?>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fullname',
            'phone',
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
            'email:email',
            'subject',
            //'messege:ntext',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return '<p class="' . Yii::$app->params['contact_status_class'][$data->status] . '">' . Yii::$app->params['contact_status'][$data->status] . '</p>';
                },
                'format' => 'raw',
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Contact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template'=>'{view}'
            ],
        ],
    ]); ?>


</div>
