<?php

use yii\helpers\Url;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
/** @var \common\models\Cars $model
 * @var \common\models\CarGallery $photo
 */
$this->title = "{$model->category->{"name_$lang"}} {$model->{"name_$lang"}}";

?>
<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>
<section class="cars_view">
    <div class="row w-100">
        <div class="col-md-5 p-0 left_cars_view">
            <div class="left_title">
                <h1><?= $this->title ?></h1>
            </div>
            <div class="left_desc">
                <p>
                    <?= $model->{"content_$lang"} ?>
                </p>
            </div>
        </div>
        <div class="col-md-7 right_cars_view">
            <img src="<?= $baseUrl . "/uploads/cars/$photo->image" ?>" alt="">
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
                Этот автобус идеально подходит для организации трансферов и захватывающих поездок по Самарканду, Бухаре,
                Хиве, Нурате и Ташкенту, чтобы вы могли насладиться всей красотой и богатством Узбекистана.
            </p>
            <p>
                Независимо от вашей цели, наши автобусы Higer обеспечат стиль, комфорт и надежность в каждой поездке.
            </p>
            <div class="booking_btn">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#bookingModal">
                    Забронировать
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="bookingModalLabel">Забронировать</h1>
                <button type="button" class="btn-close text-bg-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?= Url::to(['cars/booking']) ?>" method="post">
                            <div class="form-group">
                                <input type="text" id="fullname" name="Booking[fullname]" class="form-control"
                                       placeholder="Ф.И.О">
                            </div>
                            <div class="form-group mt-2">
                                <input type="email" id="email" name="Booking[email]" class="form-control"
                                       placeholder="Email">
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" id="phone" name="Booking[phone]" class="form-control"
                                       placeholder="Номер телефона">
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" id="from_id" name="Booking[from_id]" class="form-control"
                                       placeholder="Откуда">
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" id="to_id" name="Booking[to_id]" class="form-control"
                                       placeholder="Куда">
                            </div>
                            <div class="form-group mt-2">
                                <input type="date" id="booking_date" name="Booking[booking_date]" class="form-control"
                                       placeholder="Выберите дату">
                            </div>
                            <div class="form-group mt-2">
                                <input type="time" id="booking_time" name="Booking[booking_time]" class="form-control"
                                       placeholder="Выберите время">
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" id="airport_content" name="Booking[airport_content]"
                                       class="form-control"
                                       placeholder="Номер рейса">
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" id="content" name="Booking[content]" class="form-control"
                                       placeholder="Примечание">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-booking">
                                    Бронировать
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="booking_image">
                            <img src="<?= $baseUrl . "/uploads/cars/$photo->image" ?>" alt=""
                                 style="width: 100%; object-fit: cover">
                        </div>
                        <div class="mt-4 booking_info">
                            <ul>
                                <li>
                                    Категория: <?=$model->category->{"name_$lang"}?>
                                </li>
                                <li>
                                    Марка: <?=$model->{"name_$lang"}?>
                                </li>
                                <li>
                                    Количество мест: <?=$model->capacity?>
                                </li>
                                <li>
                                    Вместимость багажа: <?=$model->baggage?>
                                </li>
                            </ul>
                            <div class="booking_total">
                                <p>
                                    Итоговая сумма: <strong>1 000 000 UZS</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
