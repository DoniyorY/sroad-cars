<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\helpers\Html;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;

$this->title = Yii::$app->params['Contact'][$lang];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>

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

<!--Contacts Section Start-->
<section class="contacts" id="contacts">
    <div class="container">
        <div class="contacts-block">
            <div class="main-title text-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="title">
                            <h2 class="h1"><?= Yii::$app->params['Связаться с нами'][$lang] ?></h2>
                            <div class="subtitle">
                                <?= Yii::$app->params['Если у вас возникли вопросы или вы не уверены в выборе, оставьте свои контактные данные. Мы свяжемся с вами для консультации.'][$lang] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="form-block">
                <?php $contact = new \common\models\Contact();
                $form = \yii\widgets\ActiveForm::begin(['action' => Url::to(['site/about']), 'method' => 'post']) ?>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <?= $form->field($contact, 'fullname')->textInput(['placeholder' => Yii::$app->params['placeholder_fullname'][$lang]])->label(false) ?>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?= $form->field($contact, 'email')->textInput(['placeholder' => Yii::$app->params['placeholder_email'][$lang]])->label(false) ?>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?= $form->field($contact, 'phone')->textInput(['placeholder' => Yii::$app->params['placeholder_phone'][$lang]])->label(false) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($contact, 'subject')->textInput(['placeholder' => Yii::$app->params['placeholder_subject'][$lang]])->label(false) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($contact, 'message')->textarea(['placeholder' => Yii::$app->params['placeholder_message'][$lang], 'rows' => 8])->label(false) ?>
                    </div>
                    <div class="col-md-4 mt-4"></div>
                    <div class="col-md-4 mt-4 text-center">
                        <?= Html::submitButton(Yii::$app->params['send'][$lang], ['class' => 'btn btn-sroad btn-lg w-100']) ?>
                    </div>
                    <div class="col-md-4 mt-4"></div>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<!--Contacts Section End-->
<section class="y_map">
    <div style="position:relative;overflow:hidden;"><a href="https://yandex.uz/maps?utm_medium=mapframe&utm_source=maps"
                                                       style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a
                href="https://yandex.uz/maps/?ll=67.066207%2C39.657113&utm_medium=mapframe&utm_source=maps&z=16.06"
                style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск
            мест</a>
        <iframe src="https://yandex.uz/map-widget/v1/?ll=67.066207%2C39.657113&z=16.06" width="100%" height="500"
                frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
    </div>
</section>