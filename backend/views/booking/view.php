<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Booking $model */

$this->title = $model->fullname . ' ' . date('d.m.Y', $model->created);
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="booking-view">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main"><a href="<?= Yii::$app->homeUrl ?>">Гланая</a>
                        <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['index']) ?>">Бронирование</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="text-end">
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Yii::$app->params['booking_status'][$data->status];
                }
            ],
            [
                'attribute' => 'cars_id',
                'value' => function ($data) {
                    return $data->cars->name_ru;
                }
            ],
            'fullname',
            'email:email',
            'phone',
            [
                'attribute' => 'from_id',
                'value' => function ($data) {
                    return $data->from->name_ru;
                }
            ],
            [
                'attribute' => 'to_id',
                'value' => function ($data) {
                    return $data->to->name_ru;
                }
            ],
            [
                'attribute' => 'booking_date',
                'value' => function ($data) {
                    return date('d.m.Y', $data->booking_date) . ' / ' . date('H:i', $data->booking_time);
                }
            ],
            'airport_content',
            'content',
        ],
    ]) ?>

</div>
