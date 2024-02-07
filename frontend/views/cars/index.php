<?php

use common\models\CarGallery;
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['Categories'][$lang]
?>

<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>

<section class="cars_section ">
    <div class="cars_title container mb-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="first_title">
                    <h1><?= Yii::$app->params['our_cars'][$lang] ?></h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="second_title">
                    <p>Ознакомьтесь с нашим каталогом машин для незабываемой поездки</p>
                </div>
            </div>
        </div>
    </div>
    <div class="cars_filter">
        <div class="container">
            <form action="<?= Url::to(['cars/index']) ?>" method="get">
                <div class="row align-items-center">
                    <div class="col-md-2 mt-2">
                        <h2>
                            Фильтр
                        </h2>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cars_name">Название машины</label>
                        <select id="cars_name" name="CarsSearch[title]" class="js-title-select2 form-control"></select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cars_destination">Направление</label>
                        <select id="cars_destination" name="CarsSearch[to_id]"
                                class="js-to-select2 form-control"></select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cars_people_count">Количество пассажиров</label>
                        <input name="CarsSearch[people_count]" id="cars_people_count" type="text" class="form-control">
                    </div>
                    <div class="col-md-1 mt-4">
                        <button type="submit" class="btn btn-sroad w-100">поиск</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="cars_cards container mt-5">
        <div class="row">
            <?php foreach ($model as $item):
                $main = CarGallery::findOne(['cars_id' => $item->car_id, 'type_id' => 0]);
                $secondary = CarGallery::findOne(['cars_id' => $item->car_id, 'type_id' => 1]);
                if (is_null($main) or is_null($secondary)) {
                    $main = "$baseUrl/img/owl-card.png";
                    $secondary = "$baseUrl/img/owl-card-2.png";
                } else {
                    $main = "$baseUrl/uploads/cars/$main->image";
                    $secondary = "$baseUrl/uploads/cars/$secondary->image";
                }
                switch ($lang) {
                    case 'ru':
                        $capacity = $item->car->capacity . ' Мест';
                        break;
                    case 'en':
                        $capacity = "Capacity: " . $item->car->capacity;
                        break;
                    case 'uz':
                        $capacity = $item->car->capacity . ' Joy';
                        break;
                }
                ?>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card_header">
                            <p class="p-0 "><?= $capacity ?></p>
                            <img src="<?= $baseUrl . '/img/card_header.svg' ?>" alt="">
                        </div>
                        <div class="card_image1">
                            <img src="<?= $main ?>" alt="">
                        </div>
                        <div class="card_middle">
                            <p><?= $item->{"name_$lang"} ?></p>
                            <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                        </div>
                        <div class="card_image2">
                            <img src="<?= $secondary ?>" alt="">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-sroad p-0" href="<?= Url::to(['cars/view', 'id' => $item->car_id]) ?>">
                            Узнать подробнее
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>