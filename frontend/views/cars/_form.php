<?php
$baseUrl=Yii::$app->request->baseUrl;
$lang=Yii::$app->language;
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-md-6">
        <form action="<?= Url::to(['cars/booking']) ?>" method="post">
            <input type="text" name="Booking[price]" id="input_total_price" hidden="hidden" value="">
            <input type="text" name="Booking[cars_id]" id="input_total_price" hidden="hidden" value="<?=$model->id?>">
            <input type="text" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>" hidden="hidden">
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="text" id="fullname" name="Booking[fullname]" class="form-control"
                           placeholder="<?=Yii::$app->params['placeholder_fullname'][$lang]?>">
                </div>
                <div class="form-group col-md-12 mt-2">
                    <input type="email" id="email" name="Booking[email]" class="form-control"
                           placeholder="<?=Yii::$app->params['placeholder_email'][$lang]?>">
                </div>
                <div class="form-group col-md-12 mt-2">
                    <input type="text" id="phone" name="Booking[phone]" class="form-control"
                           placeholder="<?=Yii::$app->params['placeholder_phone'][$lang]?>">
                </div>
                <div class="form-group col-md-12 mt-2">
                    <!--<input type="text" id="from_id" name="Booking[from_id]" class="form-control js-from-select2"
                       placeholder="<?php /*=Yii::$app->params['Откуда'][$lang]*/?>">-->
                    <select name="Booking[from_id]" id="from_id" class="form-control js-from-select2"></select>
                </div>
                <div class="form-group col-md-12 mt-2">
                    <!--<input type="text" id="to_id" name="Booking[to_id]" class="form-control js-to-select2"
                       placeholder="<?php /*=Yii::$app->params['Куда'][$lang]*/?>">-->
                    <select name="Booking[to_id]" id="to_id" data-model-car="<?=$model->id?>" class="form-control js-to-select2"></select>
                </div>
                <div class="form-group col-md-12 mt-2">
                    <input type="date" id="booking_date" name="Booking[booking_date]" class="form-control"
                           placeholder="<?=Yii::$app->params['booking_date'][$lang]?>">
                </div>
                <div class="form-group col-md-6 mt-2">
                    <input type="time" id="booking_time" name="Booking[booking_time]" class="form-control"
                           placeholder="<?=Yii::$app->params['booking_time'][$lang]?>">
                </div>
                <div class="form-group col-md-6 mt-2">
                    <input type="number" id="booking_count" name="Booking[people_count]" class="form-control"
                          placeholder="Кол-во человек" maxlength="<?=$model->capacity?>">
                </div>
                <div class="form-group col-md-12 mt-2 d-none" id="airport_group">
                    <input type="text" id="airport_content" name="Booking[airport_content]"
                           class="form-control"
                           placeholder="<?=Yii::$app->params['Номер рейса'][$lang]?>">
                </div>
                <div class="form-group col-md-12 mt-2">
                    <input type="text" id="content" name="Booking[content]" class="form-control"
                           placeholder="<?=Yii::$app->params['Примечание'][$lang]?>">
                </div>
                <div class="form-group col-md-12 mt-2">
                    <button type="submit" class="btn btn-booking">
                        <?=Yii::$app->params['book'][$lang]?>
                    </button>
                </div>
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
                    <?=Yii::$app->params['Категория'][$lang]?>: <?=$model->category->{"name_$lang"}?>
                </li>
                <li>
                    <?=Yii::$app->params['Марка'][$lang]?>: <?=$model->{"name_$lang"}?>
                </li>
                <li>
                    <?=Yii::$app->params['Вместимость'][$lang]?>: <?=$model->capacity?>
                </li>
                <li>
                    <?=Yii::$app->params['Багаж'][$lang]?>: <?=$model->baggage?>
                </li>
            </ul>
            <div class="booking_total">
                <p>
                    <?=Yii::$app->params['Итоговая сумма'][$lang]?>: <strong id="booking_total">0 UZS</strong>
                </p>
            </div>
        </div>
    </div>
</div>