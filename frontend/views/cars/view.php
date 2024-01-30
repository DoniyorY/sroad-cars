<?php

use yii\helpers\Url;
use yii\helpers\Html;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
?>
<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>
<section class="cars_view">
    <div class="row w-100">
        <div class="col-md-5 p-0 left_cars_view">
            
        </div>
        <div class="col-md-7 right_cars_view">
            <img src="<?=$baseUrl.'/img/cars_view.png'?>" alt="">
        </div>
    </div>
</section>
