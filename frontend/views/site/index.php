<?php

/** @var yii\web\View $this */

use common\models\CarGallery;
use yii\helpers\Url;

$lang = Yii::$app->language;
$this->title = 'SilkRoad Samarkand';
$baseUrl = Yii::$app->request->baseUrl;
/**
 * @var common\models\Cars $owl_cars
 */
?>

<section class="banner">
    <div class="container-fluid banner_container">
        <div class="row">
            <div class="col-md-8 left_banner">
                <div class="banner_name">
                    <p>
                        <?= Yii::$app->params['Добро пожаловать в мир комфорта и безопасности с автопарком'][$lang] ?>
                    </p>
                </div>
                <div class="banner_title">
                    <h1>Silk Road Samarkand!</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner_search_main">
                    <div class="banner_search_title text-center">
                        <div class="kusok_derma"></div>
                        <h4><?= Yii::$app->params['Забронируйте трансфер от точки до точки'][$lang] ?></h4>
                    </div>
                    <div class="banner_search_form">
                        <div class="vector_line">
                            <img src="<?= $baseUrl . '/img/banner_form_vector_line.png' ?>" alt="">
                        </div>
                        <form action="<?= Url::to(['cars/index']) ?>">
                            <div class="form-group mt-4">
                                <label for="from_address"><?= Yii::$app->params['Откуда'][$lang] ?></label>
                                <select name="CarsSearch[from_id]" class="js-from-select2 form-control"></select>
                            </div>
                            <div class="form-group mt-4">
                                <label for="from_address"><?= Yii::$app->params['Куда'][$lang] ?></label>
                                <select name="CarsSearch[to_id]" class="js-to-select2 form-control"></select>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from_address"><?= Yii::$app->params['booking_date'][$lang] ?></label>
                                        <input name="CarsSearch[begin]" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from_address"><?= Yii::$app->params['booking_time'][$lang] ?></label>
                                        <input name="CarsSearch[end]" type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group text-center">
                                <button class="btn btn-sroad" type="submit">
                                    <?= Yii::$app->params['Найти транспорт'][$lang] ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="properties">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h2 class="h1"><?= Yii::$app->params['Наши преимущества'][$lang] ?></h2>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3><?= Yii::$app->params['Надёжность'][$lang] ?></h3>
                            </div>
                            <div class="card_image">
                                <img src="<?= $baseUrl . '/img/property-1.svg' ?>" alt="">
                            </div>
                            <div class="card_desc">
                                <p>
                                    <?= Yii::$app->params['Мы гарантируем точное и надежное выполнение всех услуг, чтобы ваше путешествие началось с хорошего настроения.'][$lang] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3><?= Yii::$app->params['Комфорт'][$lang] ?></h3>
                            </div>
                            <div class="card_image">
                                <img src="<?= $baseUrl . '/img/property-2.svg' ?>" alt="">
                            </div>
                            <div class="card_desc">
                                <p>
                                    <?= Yii::$app->params['Все наши транспортные средства поддерживаются в идеальном состоянии, а ваша безопасность - нашей первостепенной заботой.'][$lang] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3><?= Yii::$app->params['Профессионализм'][$lang] ?></h3>
                            </div>
                            <div class="card_image">
                                <img src="<?= $baseUrl . '/img/property-3.svg' ?>" alt="">

                            </div>
                            <div class="card_desc">
                                <p>
                                    <?= Yii::$app->params['Наши водители опытные и заботливые профессионалы, готовые сделать ваше пребывание незабываемым.'][$lang] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-5 properties_desc">
                <p class="text-center">
                    <?= Yii::$app->params['properties_desc'][$lang] ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="owl_categories">
    <div class="container">
        <div class="row w-100">
            <div class="col-md-12 text-center mb-5">
                <h2 class="h1"><?= Yii::$app->params['Категории доступных транспортов'][$lang] ?></h2>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($owl_cars as $item):
                        $conn = \common\models\Connector::find()->where(['car_id' => $item->id])->orderBy(['price' => SORT_ASC])->one();
                        $main = CarGallery::findOne(['cars_id' => $item->id, 'type_id' => 0]);
                        if (is_null($main)) {
                            $main = "$baseUrl/img/owl-card.png";
                        } else {
                            $main = "$baseUrl/uploads/cars/$main->image";
                        }
                        switch ($lang) {
                            case 'ru':
                                $capacity = $item->capacity . ' Мест';
                                $price = '<strong>Цена от: </strong>' . Yii::$app->formatter->asDecimal($conn->price, 0) . ' UZS';
                                break;
                            case 'en':
                                $capacity = "Capacity: $item->capacity";
                                $price = '<strong>Price: </strong>' . Yii::$app->formatter->asDecimal($conn->price, 0) . ' UZS';
                                break;
                            case 'uz':
                                $capacity = "$item->capacity Joy";
                                $price = Yii::$app->formatter->asDecimal($conn->price, 0) . ' <strong> So`mdan</strong>';
                                break;
                        }
                        ?>
                        <div class="item">
                            <div class="card border-0 rounded-0 ">
                                <div class="card_header">
                                    <p class="p-0 "><?= $capacity ?></p>
                                    <img src="<?= $baseUrl . '/img/card_header.svg' ?>" style="width: 100%;" alt="">
                                </div>
                                <div class="card_image1">
                                    <img src="<?= $main ?>" alt="" style="width: 100%;">
                                </div>
                                <div class="card_middle">
                                    <p><?= $item->{"name_$lang"} ?></p>
                                    <img src="<?= $baseUrl . '/img/card_middle.svg' ?>" alt="">
                                </div>
                                <div class="card_image2">
                                    <div class="card_info">
                                        <div class="capacity"><strong><?= Yii::$app->params['Вместимость'][$lang] ?>
                                                :</strong> <?= $item->capacity ?></div>
                                        <div class="baggage"><strong><?= Yii::$app->params['Багаж'][$lang] ?>
                                                :</strong> <?= $item->baggage ?></div>
                                    </div>
                                    <p style="margin-top: 10px;">
                                        <?= mb_substr($item->{"short_$lang"}, 0, 175) . '...'; ?>
                                    </p>
                                    <!-- <img src="<?php /*= $secondary */
                                    ?>" alt="">-->
                                </div>
                                <div class="card_footer">
                                    <div class="card_price">
                                        <?= $price ?>
                                    </div>
                                    <a class="btn btn-sroad" href="<?= Url::to(['cars/view', 'id' => $item->id]) ?>">
                                        <?= Yii::$app->params['learnMore'][$lang] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section_cities">
    <div class="container">
        <div class="row w-100">
            <div class="col-md-12 text-center mb-5">
                <h2 class="h1"><?= Yii::$app->params['Поездки по городам Узбекистана'][$lang] ?></h2>
                <p style="font-size: 20px; text-align: center">
                    <?= Yii::$app->params['Приглашаем вас отправиться с нами в увлекательное путешествие по городам Великого Шелкового Пути.'][$lang] ?>
                </p>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/cities_samarkand.png' ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="card_middle">
                        <p><?= Yii::$app->params['Экскурсия по Самарканду'][$lang] ?></p>
                        <img src="<?= $baseUrl . '/img/card_cities.svg' ?>" alt="">
                    </div>
                    <div class="card-body">
                        <p style="margin-top: 10px; height: 285px;">
                            <?= Yii::$app->params['city_desc1'][$lang] ?>
                        </p>
                        <div class="city_card_link">
                            <a href="#" class="btn btn-sroad">
                                <?= Yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/cities_tashkent.jpg' ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="card_middle">
                        <p><?= Yii::$app->params['Поездка в Ташкент'][$lang] ?></p>
                        <img src="<?= $baseUrl . '/img/card_cities.svg' ?>" alt="">
                    </div>
                    <div class="card-body">
                        <p style="margin-top: 10px;">
                            <?= Yii::$app->params['city_desc3'][$lang] ?>
                        </p>
                        <div class="city_card_link">
                            <a href="#" class="btn btn-sroad">
                                <?= Yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/cities_shaxrisabz.png' ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="card_middle">
                        <p><?= Yii::$app->params['Поездка в Шахрисабз'][$lang] ?></p>
                        <img src="<?= $baseUrl . '/img/card_cities.svg' ?>" alt="">
                    </div>
                    <div class="card-body">
                        <p style="margin-top: 10px;">
                            <?= Yii::$app->params['city_desc2'][$lang] ?>
                        </p>
                        <div class="city_card_link">
                            <a href="#" class="btn btn-sroad">
                                <?= Yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/cities_nurata.jpg' ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="card_middle">
                        <p><?= Yii::$app->params['Поездка в Нурату'][$lang] ?></p>
                        <img src="<?= $baseUrl . '/img/card_cities.svg' ?>" alt="">
                    </div>
                    <div class="card-body">
                        <p style="margin-top: 10px;">
                            <?= Yii::$app->params['city_desc4'][$lang] ?>
                        </p>
                        <div class="city_card_link">
                            <a href="#" class="btn btn-sroad">
                                <?= Yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/cities_xiva.png' ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="card_middle">
                        <p><?= Yii::$app->params['Поездка в Хиву'][$lang] ?></p>
                        <img src="<?= $baseUrl . '/img/card_cities.svg' ?>" alt="">
                    </div>
                    <div class="card-body">
                        <p style="margin-top: 10px;">
                            <?= Yii::$app->params['city_desc6'][$lang] ?>
                        </p>
                        <div class="city_card_link">
                            <a href="#" class="btn btn-sroad">
                                <?= Yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card_image1">
                        <img src="<?= $baseUrl . '/img/cities_bukhara.jpg' ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="card_middle">
                        <p><?= Yii::$app->params['Поездка в Бухару'][$lang] ?></p>
                        <img src="<?= $baseUrl . '/img/card_cities.svg' ?>" alt="">
                    </div>
                    <div class="card-body">
                        <p style="margin-top: 10px;">
                            <?= Yii::$app->params['city_desc5'][$lang] ?>
                        </p>
                        <div class="city_card_link">
                            <a href="#" class="btn btn-sroad">
                                <?= Yii::$app->params['learnMore'][$lang] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>