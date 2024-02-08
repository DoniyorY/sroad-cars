<?php

use common\models\Cars;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CarsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Машины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main">
                            <a href="<?= Yii::$app->homeUrl ?>">Гланая</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'manufacture_id',
                'value' => function ($data) {
                    return $data->manufacture->name_ru;
                }
            ],
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->name_ru;
                }
            ],
            'name_ru',
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
            [
                'attribute' => 'capacity',
                'value' => function ($data) {
                    return $data->capacity . ' / ' . $data->baggage;
                },
                'header'=>'Вмещаемость / Багаж'
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    if ($data->status == 0) {
                        return Html::a(Yii::$app->params['status'][$data->status], ['status', 'id' => $data->id, 'status' => 1], ['class' => 'btn btn-success btn-sm w-100', 'data-method' => 'post']);
                    } else {
                        return Html::a(Yii::$app->params['status'][$data->status], ['status', 'id' => $data->id, 'status' => 0], ['class' => 'btn btn-danger w-100 btn-sm', 'data-method' => 'post']);
                    }
                },
                'format' => 'raw',
                'filter' => Yii::$app->params['status'],
            ],
            //'name_ru',
            //'name_en',
            //'name_uz',
            //'content_ru:ntext',
            //'content_en:ntext',
            //'content_uz:ntext',
            //'capacity',
            //'baggage',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cars $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
