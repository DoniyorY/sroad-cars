<?php

use yii\helpers\Url;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
/** @var \common\models\Cars $model
 * @var \common\models\CarGallery $photo
 */
$this->title = "{$model->category->{"name_$lang"}} {$model->{"name_$lang"}}";

?>
<?php if (Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">
        <?=Yii::$app->session->getFlash('success')?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif;?>
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
                <?= $this->render('_form', ['model' => $model, 'photo' => $photo]) ?>
            </div>

        </div>
    </div>
</div>
