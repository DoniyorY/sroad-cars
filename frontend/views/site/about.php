<?php

/** @var yii\web\View $this */

$lang=Yii::$app->language;
$baseUrl=Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['About'][$lang];
?>
<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>
<section class="site-about">
    <div class="container-fluid">
        <div class="row">
            <div class="title text-center mb-3">
                <h2><?= $this->title ?></h2>
            </div>
            <div class="col-md-6 p-3" style="font-size: 18px;">
                <p align="justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus earum ipsam libero quae quisquam reprehenderit!
                </p>
            </div>
            <div class="col-md-6">
                <div class="owl-carousel owl-theme my-owl" id="owl-carousel">
                    <div class="item about_item">
                        <img class="owl-img" src="<?= $baseUrl . '/img/banner_1.png' ?>" alt="images not found">
                        <div class="cover">
                            <div class="container">
                                <div class="header-content">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="owl-img" src="<?= $baseUrl . '/img/owl-card.png' ?>" alt="images not found">
                        <div class="cover">
                            <div class="container">
                                <div class="header-content">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

