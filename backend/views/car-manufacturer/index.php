<?php

use common\models\CarManufacturer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CarManufacturerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Марки машин';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-manufacturer-index">
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
        <div class="col-md-8"></div>
        <div class="col-md-4 mb-2">
            <button class="btn w-100 btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                Добавить
            </button>
        </div>
        <div class="col-md-12">
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <?php echo $this->render('_form', ['model' => new CarManufacturer()]); ?>
                </div>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name_ru',
            'name_en',
            'name_uz',
            'image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CarManufacturer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
