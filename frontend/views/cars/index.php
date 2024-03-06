<?php

use common\models\CarGallery;
use common\models\search\ConnectorSearch;
use yii\helpers\Url;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['Categories'][$lang]
/**
 * @var common\models\Connector $model
 */
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
                    <p><?= Yii::$app->params['our_cars_content'][$lang] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="cars_filter">
        <div class="container">
            <?= $this->render('_search_form', ['model' => new ConnectorSearch()]) ?>
        </div>
    </div>
    <div class="cars_cards container mt-5">
        <div class="row">
            <?php foreach ($model as $item):
                $main = CarGallery::findOne(['cars_id' => $item->car_id, 'type_id' => 0]);
                $conn = \common\models\Connector::find()->where(['car_id' => $item->car_id])->orderBy(['price' => SORT_ASC])->one();
                if (is_null($main)) {
                    $main = "$baseUrl/img/owl-card.png";
                } else {
                    $main = "$baseUrl/uploads/cars/$main->image";
                }
                switch ($lang) {
                    case 'ru':
                        $capacity = $item->car->capacity . ' Мест';
                        if ($conn) {
                            $price = '<strong style="margin-left: 15px;">Цена от: </strong>' . Yii::$app->formatter->asDecimal($conn->price, 0) . ' UZS';
                        } else {
                            $price = '<strong style="margin-left: 15px;">Цена от: </strong>' . 0 . ' UZS';
                        }
                        break;
                    case 'en':
                        $capacity = "Capacity: " . $item->car->capacity;
                        if ($conn) {
                            $price = '<strong style="margin-left: 15px;">Price: </strong>' . Yii::$app->formatter->asDecimal($conn->price, 0) . ' UZS';
                        } else {
                            $price = '<strong style="margin-left: 15px;">Price: </strong>' . 0 . ' UZS';
                        }
                        break;
                    case 'uz':
                        $capacity = $item->car->capacity . ' Joy';
                        if ($conn) {
                            $price = Yii::$app->formatter->asDecimal($conn->price, 0) . ' <strong> UZS</strong>';
                        } else {
                            $price = 0 . ' <strong> UZS</strong>';
                        }
                        break;
                }
                ?>
                <div class="col-md-4 mt-3">
                    <div class="card border-0 rounded-0 ">
                        <div class="card_header">
                            <p class="p-0 "><?= $capacity ?></p>
                            <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                        </div>
                        <div class="card_image1">
                            <img src="<?= $main ?>" alt="" style="width: 100%;">
                        </div>
                        <div class="card_middle">
                            <p><?= $item->car->category->{"name_$lang"}. ' '. $item->car->{"name_$lang"} ?></p>
                            <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                        </div>
                        <div class="card_image2">
                            <div class="card_info">
                                <div class="capacity"><strong><?= Yii::$app->params['Вместимость'][$lang] ?>
                                        :</strong> <?= $item->car->capacity ?></div>
                                <div class="baggage"><strong><?= Yii::$app->params['Багаж'][$lang] ?>
                                        :</strong> <?= $item->car->baggage ?></div>
                            </div>
                            <p style="margin-top: 10px;">
                                <?= mb_substr($item->car->{"short_$lang"}, 0, 175) . '...'; ?>
                            </p>
                            <!-- <img src="<?php /*= $secondary */
                            ?>" alt="">-->
                        </div>
                        <div class="card_footer" style="background: #f3f3f3">
                            <div class="card_price">
                                <?= $price ?>
                            </div>
                            <a class="btn btn-sroad" href="<?= Url::to(['cars/view', 'id' => $item->car_id]) ?>">
                                <?= yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>