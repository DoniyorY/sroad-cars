<?php

use common\models\Booking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">
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
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fullname',
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
            [
                'attribute' => 'booking_date',
                'value' => function ($data) {
                    return date('d.m.Y', $data->booking_date) . ' ' . date('H:i', $data->booking_time);
                }
            ],
            [
                'attribute' => 'cars_id',
                'value' => function ($data) {
                    return $data->cars->name_ru;
                }
            ],
            //'email:email',
            'phone',
            [
                'header' => 'Маршрут',
                'value' => function ($data) {
                    return $data->from->name_ru . ' - ' . $data->to->name_ru;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Html::a(Yii::$app->params['booking_status'][$data->status], '#', ['class' => Yii::$app->params['booking_status_class'][$data->status]]);
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Booking $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template'=>'{view}'
            ],
        ],
    ]); ?>
</div>
