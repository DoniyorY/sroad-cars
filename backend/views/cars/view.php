<?php

use common\models\Address;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Cars $model */
/** @var common\models\CarGallery $photo */
/** @var common\models\CarGallery $gallery */
/** @var common\models\Connector $connect */
/** @var common\models\Connector $show_conn */

$this->title = $model->name_ru;
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
    <?php
    if (Yii::$app->session->hasFlash('warning')):
        ?>
        <!-- Warning Alert -->
        <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
            <i class="ri-alert-line me-3 align-middle"></i>
            <strong>Внимание </strong><?= Yii::$app->session->getFlash('warning') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="mb-3 btn-group">
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if ($model->status == 0) {
            echo Html::a('Активный', ['status', 'id' => $model->id, 'status' => 1], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Подтвердите действие!!!',
                    'method' => 'post',
                ],
            ]);
        } else {
            echo Html::a('Отключённый', ['status', 'id' => $model->id, 'status' => 0], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Подтвердите действие!!!',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-7">
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
                    'short_ru',
                    'short_en',
                    'short_uz',
                    'content_ru:ntext',
                    'content_en:ntext',
                    'content_uz:ntext',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return Yii::$app->params['status'][$data->status];
                        }
                    ],
                    'capacity',
                    'baggage',
                ],
            ]) ?>
        </div>
        <div class="col-md-5">
            <ul class="nav nav-tabs nav-justified nav-border-top" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cars-photo"
                            type="button" role="tab" aria-controls="cars-photo" aria-selected="true">Фотографии
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#cars-destinations"
                            type="button" role="tab" aria-controls="cars-destinations" aria-selected="false">Маршруты
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#cars-owl"
                            type="button" role="tab" aria-controls="cars-owl" aria-selected="false">Owl
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="cars-photo" role="tabpanel" aria-labelledby="home-tab"
                     tabindex="0">
                    <h2>Фотографии</h2>
                    <?php $form = ActiveForm::begin(['method' => 'post']); ?>
                    <?= $form->field($photo, 'cars_id')->textInput(['hidden' => true, 'value' => $model->id])->label(false) ?>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($photo, 'type_id')->dropDownList(Yii::$app->params['photo_type'], ['prompt' => 'Выберите категорию']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($photo, 'imageFile')->fileInput() ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary mt-4 w-100']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <div class="row">
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
                                <?php $i = 1;
                                foreach ($gallery as $item): ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= Yii::$app->params['photo_type'][$item->type_id] ?></td>
                                        <td><?= $item->image ?></td>
                                        <td><?= Html::a('<i class="ri-delete-bin-line">', ['delete-photo', 'id' => $item->id], ['class' => 'btn btn-danger btn-sm', 'data-method' => 'post']) ?></td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cars-destinations" role="tabpanel" aria-labelledby="profile-tab"
                     tabindex="0">
                    <h2>Цены на маршруты</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $form = ActiveForm::begin(['action' => Url::to(['create-address'])]) ?>
                            <div class="row">
                                <?= $form->field($connect, 'car_id')->textInput(['hidden' => true, 'value' => $model->id])->label(false) ?>
                                <div class="col-md-4">
                                    <?= $form->field($connect, 'address_id')->dropDownList(ArrayHelper::map(Address::findAll(['category_id' => 1]), 'id', 'name_ru'), ['prompt' => 'Выберите адрес']) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($connect, 'price')->textInput() ?>
                                </div>
                                <div class="col-md-4">
                                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-secondary w-100 mt-4']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end() ?>
                        </div>
                        <div class="col-md-12 mt-3">
                            <table class="table table-sm table-bordered table-striped text-center">
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
                                            <a href="<?= Url::to(['delete-address', 'id' => $item->id]) ?>"
                                               class="btn btn-danger btn-sm" data-method="post">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cars-owl" role="tabpanel" aria-labelledby="contact-tab"
                     tabindex="0">
                    <h2>Owl Carousel</h2>
                    <!-- Horizontal Collapse -->
                    <div class="mb-3 text-end">
                        <button class="btn btn-success" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseWidthExample" aria-expanded="true"
                                aria-controls="collapseWidthExample">
                            Добавить
                        </button>
                    </div>
                    <div>
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">
                            <div class="card card-body mb-0">
                                <?= $this->render('_form_owl', ['model' => new \common\models\CarsOwl(), 'car_id' => $model->id]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table table-sm table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Заголовок</th>
                                    <th>Изображение</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($owl as $item):?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td>
                                            <?=$item->title_ru?>
                                        </td>
                                        <td><?=$item->image?></td>
                                        <td>
                                            <?=Html::a('<i class="ri-delete-bin-line"></i>',['delete-owl','id'=>$item->id],['class'=>'btn btn-danger btn-sm'])?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
