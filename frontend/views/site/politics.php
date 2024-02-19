<?php
$baseUrl = Yii::$app->request->baseUrl;
$lang = Yii::$app->language;
$this->title=Yii::$app->params['Politics'][$lang];
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>
<section style="padding-bottom: 50px;">
    <div class="container">
        <div class="title my-5">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="text-start" style="font-size: 18px;">
            <?=Yii::$app->params['politics_text'][$lang]?>
        </div>
    </div>
</section>
