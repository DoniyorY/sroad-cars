<?php

use yii\helpers\Url;
use yii\helpers\Html;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
$this->title = 'Автобус HIGER';
?>
<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>
<section class="cars_view">
    <div class="row w-100">
        <div class="col-md-5 p-0 left_cars_view">
            <div class="left_title">
                <h1>Автобус HIGER</h1>
            </div>
            <div class="left_desc">
                <p>
                    Наши автобусы Higer — это идеальное сочетание простора и комфорта. <br>
                    Благодаря уютному кожаному салону, ваша поездка будет особенно приятной и расслабляющей. <br>
                    Этот автобус идеально подходит для организации трансферов и захватывающих поездок по
                    Самарканду, Бухаре, Хиве, Нурате и Ташкенту, чтобы вы могли насладиться всей
                    красотой и богатством Узбекистана. <br>
                    Независимо от вашей цели, наши автобусы Higer обеспечат стиль, комфорт и надежность в
                    каждой поездке.
                </p>
            </div>
        </div>
        <div class="col-md-7 right_cars_view">
            <img src="<?= $baseUrl . '/img/cars_view.png' ?>" alt="">
        </div>
    </div>
</section>
<section class="cars_detail">
    <div class="container">
        <div class="cars_detail_title">
            <h1>
                Экскурсии по городам на автобусах Higer
            </h1>
        </div>
        <div class="cars_detail_content">
            <p>
                Этот автобус идеально подходит для организации трансферов и захватывающих поездок по Самарканду, Бухаре, Хиве, Нурате и Ташкенту, чтобы вы могли насладиться всей красотой и богатством Узбекистана.
            </p>
            <p>
                Независимо от вашей цели, наши автобусы Higer обеспечат стиль, комфорт и надежность в каждой поездке.
            </p>
        </div>

    </div>

</section>
