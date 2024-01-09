<?php

use common\models\Banner;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\BannerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Баннер';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">
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
    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name_ru',
            //'name_en',
            //'name_uz',
            'title_ru',
            //'title_en',
            //'title_uz',
            'image',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    if ($data->status == 0) {
                        return Html::a(Yii::$app->params['status'][$data->status], ['status', 'id' => $data->id, 'status' => 1], ['class' => 'btn btn-sm btn-success w-100']);
                    }else{
                        return Html::a(Yii::$app->params['status'][$data->status], ['status', 'id' => $data->id, 'status' => 0], ['class' => 'btn btn-sm btn-danger w-100']);
                    }
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Banner $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
