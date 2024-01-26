<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$lang = Yii::$app->language;
$this->title = 'SilkRoad Samarkand';
?>

<section class="banner">
    <div class="container-fluid banner_container">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="banner_search_main">
                    <div class="banner_search_title text-center">
                        <div class="kusok_derma"></div>
                        <h4>Забронируйте трансфер от точки до точки</h4>
                    </div>
                    <div class="banner_search_form">
                        <div class="vector_line">
                            <img src="<?=$baseUrl=Yii::$app->request->baseUrl.'/img/banner_form_vector_line.png'?>" alt="">
                        </div>
                        <form action="<?=Url::to(['cars/search'])?>">
                            <div class="form-group mt-4">
                                <label for="from_address">Выберите начальнюю локацию маршрута</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <label for="from_address">Выберите конечную локацию маршрута</label>
                                <input type="text" class="form-control">
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