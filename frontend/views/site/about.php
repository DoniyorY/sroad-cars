<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['About'][$lang];
?>
<div class="cars_banner">
    <img src="<?= $baseUrl . '/img/breadcrumbs_banner.png' ?>" alt="">
</div>
<section class="site-about">
    <div class="container-fluid">
        <div class="row">
            <div class="title text-center mb-3">
                <h1><?= $this->title ?></h1>
            </div>
            <div class="col-md-6 p-3" style="font-size: 18px;">
                <p align="justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem ducimus eius error est hic magni
                    minus nesciunt nulla, officiis perspiciatis repellat reprehenderit repudiandae sequi sunt tenetur ut
                    velit. Atque ea enim eum harum praesentium repellat voluptatum? Cum facere nam porro totam unde
                    voluptas. Ex minima mollitia non nostrum quia ratione ullam? Ab aliquid amet commodi doloribus fugit
                    iste labore nihil nulla perspiciatis possimus, reiciendis, reprehenderit sed ullam? A assumenda
                    consectetur enim facilis necessitatibus quos veniam veritatis. Asperiores atque autem beatae cum
                    cumque deserunt, dignissimos dolor est illo incidunt ipsum iusto labore libero magni maiores minima
                    modi molestiae molestias nulla perferendis porro possimus praesentium quam quidem sint tempora
                    temporibus vitae! Aliquam atque eos exercitationem magni officiis repellat repudiandae vel. Aut
                    consequatur eius exercitationem illum incidunt laboriosam minima placeat quisquam! Adipisci alias
                    aliquid amet at consequatur consequuntur deleniti dignissimos distinctio doloremque, dolorum earum
                    est et harum impedit in ipsam ipsum laudantium magnam maiores maxime minus modi molestiae nam nihil
                    nobis, nulla officiis optio porro possimus quasi quia quisquam reiciendis repellat repellendus
                    similique sit unde? Aspernatur cumque eos maxime sit? Architecto autem deserunt, eius ex fuga fugit
                    in molestias, nemo neque officiis optio perferendis porro praesentium quasi, quia sit tenetur.
                    Aliquam aliquid asperiores dolores quam repellat. Eveniet, harum, sed. A accusamus aliquid
                    consequatur, culpa exercitationem maxime, natus nemo neque nulla officia quae quam quod. Accusamus
                    accusantium consectetur doloremque eligendi eum ex, necessitatibus quas voluptates? Assumenda
                    doloribus perspiciatis praesentium suscipit? Commodi, debitis voluptas. Aspernatur aut commodi
                    deserunt dolorem incidunt ipsum maxime nisi ut vel veritatis. Aliquid cumque facilis harum maiores
                    nulla quo reprehenderit voluptatem. A accusamus accusantium aliquid animi aut cum delectus eligendi
                    error et explicabo impedit, labore molestiae mollitia neque nesciunt nostrum optio perspiciatis
                    reiciendis reprehenderit rerum totam ullam veniam! Ad aliquam aperiam architecto dolores hic in,
                    inventore laboriosam sequi sint suscipit.
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
<!--Contacts Section Start-->
<section class="contacts" id="contacts">
    <div class="container">
        <div class="contacts-block">
            <div class="main-title text-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="title">
                            <h2 class="h1">Связаться с нами</h2>
                            <div class="subtitle">
                                Если у вас возникли вопросы или вы не уверены в выборе, оставьте свои
                                контактные данные. Мы свяжемся с вами для консультации.
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
