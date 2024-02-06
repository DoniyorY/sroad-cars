<?php

use common\models\Address;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Cars $model */

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= $this->title ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" data-key="t-main">
                            <a href="<?= Yii::$app->homeUrl ?>">Гланая</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= \yii\helpers\Url::to(['index']) ?>">Машины</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $this->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 btn-group">
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if ($model->status == 0) {
            echo Html::a('Активный', ['status', 'id' => $model->id, 'status' => 1], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        } else {
            echo Html::a('Отключённый', ['status', 'id' => $model->id, 'status' => 0], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-5">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
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
                    [
                        'attribute' => 'type_id',
                        'value' => function ($data) {
                            return $data->type->name_ru;
                        }
                    ],
                    [
                        'attribute' => 'created',
                        'value' => function ($data) {
                            return date('d.m.Y', $data->created);
                        }
                    ],
                    'name_ru',
                    'name_en',
                    'name_uz',
                    'content_ru:ntext',
                    'content_en:ntext',
                    'content_uz:ntext',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return Yii::$app->params['status'][$data->status];
                        }
                    ],
                    [
                        'attribute' => 'price',
                        'value' => function ($data) {
                            return Yii::$app->formatter->asDecimal($data->price, 0);
                        }
                    ],
                    'capacity',
                    'baggage',
                ],
            ]) ?>
        </div>
        <div class="col-md-7">
            <h2>Фотографии</h2>
            <div class="row">
                <?php $form = ActiveForm::begin(['action' => Url::to(['add-photo']), 'method' => 'post']); ?>
                <?= $form->field($photo, 'cars_id')->textInput(['hidden' => true, 'value' => $model->id])->label(false) ?>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($photo, 'type_id')->dropDownList(Yii::$app->params['photo_type'], ['prompt' => 'Выберите категорию']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($photo, 'imageFile')->fileInput() ?>
                    </div>
                    <div class="col-md-4">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success mt-4 w-100']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <div class="col-md-12 mt-2">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Категория</th>
                            <th>Название</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <h2>Цены на маршруты</h2>
                    <?php $form = ActiveForm::begin(['action' => Url::to(['create-address'])]) ?>
                    <div class="row">
                        <?= $form->field($connect, 'car_id')->textInput(['hidden' => true, 'value' => $model->id])->label(false) ?>
                        <div class="col-md-4">
                            <?= $form->field($connect, 'address_id')->dropDownList(ArrayHelper::map(Address::findAll(['category_id' => 1]), 'id', 'name_ru'),['prompt'=>'Выберите адрес']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($connect, 'price')->textInput() ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::submitButton('Добавить', ['class' => 'btn btn-success w-100 mt-4']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
                <div class="col-md-12 mt-3">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Маршрут</th>
                            <th>Цена</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;
                        foreach ($show_conn as $item): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->address->name_ru ?></td>
                                <td><?= Yii::$app->formatter->asDecimal($item->price, 0) ?></td>
                                <td>
                                    <?= Html::a('Удалить', ['delete-address', 'id' => $item->id], ['class' => 'btn btn-danger btn-sm w-100','data-method'=>'post']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</div>
