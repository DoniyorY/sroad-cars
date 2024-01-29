<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$lang = Yii::$app->language;
$this->title = 'SilkRoad Samarkand';
$baseUrl = Yii::$app->request->baseUrl;
?>

<section class="banner">
    <div class="container-fluid banner_container">
        <div class="row">
            <div class="col-md-8 left_banner">
                <div class="banner_name">
                    <p>
                        Добро пожаловать в мир комфорта
                        и безопасности с автопарком
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
                        <h4>Забронируйте трансфер от точки до точки</h4>
                    </div>
                    <div class="banner_search_form">
                        <div class="vector_line">
                            <img src="<?= $baseUrl . '/img/banner_form_vector_line.png' ?>" alt="">
                        </div>
                        <form action="<?= Url::to(['cars/search']) ?>">
                            <div class="form-group mt-4">
                                <label for="from_address">Выберите начальнюю локацию маршрута</label>
                                <input type="text" class="form-control" placeholder="Выберите маршрут">
                            </div>
                            <div class="form-group mt-4">
                                <label for="from_address">Выберите конечную локацию маршрута</label>
                                <input type="text" class="form-control" placeholder="Выберите маршрут">
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from_address">Дата начала маршрута</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from_address">Время начала маршрута</label>
                                        <input type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group text-center">
                                <button class="btn btn-sroad" type="submit">
                                    Найти транспорт
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
                <h2 class="h1">Наши преимущества</h2>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3>Надёжность</h3>
                            </div>
                            <div class="card_image">
                                <img src="<?= $baseUrl . '/img/property-1.svg' ?>" alt="">
                            </div>
                            <div class="card_desc">
                                <p>
                                    Мы гарантируем точное и надежное выполнение всех услуг, чтобы ваше путешествие
                                    началось с хорошего настроения.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3>Комфорт</h3>
                            </div>
                            <div class="card_image">
                                <img src="<?= $baseUrl . '/img/property-2.svg' ?>" alt="">
                            </div>
                            <div class="card_desc">
                                <p>
                                    Все наши транспортные средства поддерживаются в идеальном состоянии, а ваша
                                    безопасность - нашей первостепенной заботой.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3>Профессионализм</h3>
                            </div>
                            <div class="card_image">
                                <img src="<?= $baseUrl . '/img/property-3.svg' ?>" alt="">

                            </div>
                            <div class="card_desc">
                                <p>
                                    Наши водители опытные и заботливые профессионалы, готовые сделать ваше пребывание
                                    незабываемым.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-5 properties_desc">
                <p>
                    С <strong>автопарком Silk Road Samarkand</strong>, ваше путешествие становится легким и приятным.
                    Доверьтесь нам организацию ваших туров и экскурсий, и мы гарантируем, что вы получите незабываемый
                    опыт в самом комфортабельном и безопасном автотранспорте.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="owl_categories">
    <div class="container">
        <div class="row w-100">
            <div class="col-md-12 text-center mb-5">
                <h2 class="h1">Категории доступных транспортов</h2>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="card_header">
                                <p class="p-0 ">99 Мест</p>
                                <img src="<?= $baseUrl . '/img/card_header.svg' ?>" alt="">
                            </div>
                            <div class="card_image1">
                                <img src="<?= $baseUrl . '/img/owl-card.png' ?>" alt="">
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
                    <div class="item">
                        <div class="card">
                            <div class="card_header">
                                <p class="p-0 ">99 Мест</p>
                                <img src="<?= $baseUrl . '/img/card_header.svg' ?>" alt="">
                            </div>
                            <div class="card_image1">
                                <img src="<?= $baseUrl . '/img/owl-card.png' ?>" alt="">
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
                    <div class="item">
                        <div class="card">
                            <div class="card_header">
                                <p class="p-0 ">99 Мест</p>
                                <img src="<?= $baseUrl . '/img/card_header.svg' ?>" alt="">
                            </div>
                            <div class="card_image1">
                                <img src="<?= $baseUrl . '/img/owl-card.png' ?>" alt="">
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
                    <div class="item">
                        <div class="card">
                            <div class="card_header">
                                <p class="p-0 ">99 Мест</p>
                                <img src="<?= $baseUrl . '/img/card_header.svg' ?>" alt="">
                            </div>
                            <div class="card_image1">
                                <img src="<?= $baseUrl . '/img/owl-card.png' ?>" alt="">
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
        </div>
    </div>
</section>