<?php

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
                        <input name="CarsSearch[title]" id="cars_name" type="text" class="form-control" placeholder="Выберите машину">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cars_destination">Категория</label>
                        <input name="CarsSearch[type_id]" id="cars_destination" type="text" class="form-control"
                               placeholder="Выберите категорию">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cars_people_count">Количество пассажиров</label>
                        <input name="CarsSearch[capacity]" id="cars_people_count" type="text" class="form-control">
                    </div>
                    <div class="col-md-1 mt-4">
                        <button type="submit" class="btn btn-sroad w-100">Поиск</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="cars_cards container mt-5">
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card_header">
                        <p class="p-0 ">99 Мест</p>
                        <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/owl-card.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_middle">
                        <p>Mercedes-Benz Sprinter</p>
                        <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                    </div>
                    <div class="card_image2">
                        <img src="<?= $baseUrl . '/img/owl-card-2.png' ?>" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sroad p-0" href="#">
                        Узнать подробнее
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card_header">
                        <p class="p-0 ">99 Мест</p>
                        <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/owl-card.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_middle">
                        <p>Mercedes-Benz Sprinter</p>
                        <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                    </div>
                    <div class="card_image2">
                        <img src="<?= $baseUrl . '/img/owl-card-2.png' ?>" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sroad p-0" href="#">
                        Узнать подробнее
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card_header">
                        <p class="p-0 ">99 Мест</p>
                        <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/owl-card.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_middle">
                        <p>Mercedes-Benz Sprinter</p>
                        <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                    </div>
                    <div class="card_image2">
                        <img src="<?= $baseUrl . '/img/owl-card-2.png' ?>" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sroad p-0" href="#">
                        Узнать подробнее
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card_header">
                        <p class="p-0 ">99 Мест</p>
                        <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/owl-card.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_middle">
                        <p>Mercedes-Benz Sprinter</p>
                        <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                    </div>
                    <div class="card_image2">
                        <img src="<?= $baseUrl . '/img/owl-card-2.png' ?>" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sroad p-0" href="#">
                        Узнать подробнее
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card_header">
                        <p class="p-0 ">99 Мест</p>
                        <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/owl-card.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_middle">
                        <p>Mercedes-Benz Sprinter</p>
                        <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                    </div>
                    <div class="card_image2">
                        <img src="<?= $baseUrl . '/img/owl-card-2.png' ?>" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sroad p-0" href="#">
                        Узнать подробнее
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card_header">
                        <p class="p-0 ">99 Мест</p>
                        <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/owl-card.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div class="card_middle">
                        <p>Mercedes-Benz Sprinter</p>
                        <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                    </div>
                    <div class="card_image2">
                        <img src="<?= $baseUrl . '/img/owl-card-2.png' ?>" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sroad p-0" href="#">
                        Узнать подробнее
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>