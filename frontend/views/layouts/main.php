<?php

/** @var \yii\web\View $this */

/** @var string $content */

use cinghie\multilanguage\widgets\MultiLanguageWidget;
use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shotcut icon" href="<?= $baseUrl . '/img/favicon.svg' ?>">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div class="pre-header">
        <div class="container">
            <div class="icon-container">
                <div class="icons">
                    <div class="icon-item"><a href="mailto:svyatoslav.kipin@silkroad-samarkand.com"><i
                                    class="bi bi-envelope"></i>svyatoslav.kipin@silkroad-samarkand.com</a></div>
                    <div class="icon-item">/</div>
                    <div class="icon-item">
                        <a href="mailto:+998946700101"><i class="bi bi-telephone"></i>+998 (94) 670-01-01</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header>
        <nav id="w0" class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand logo" href="<?= Yii::$app->homeUrl ?>">
                    <img src="<?= $baseUrl . '/logo.png' ?>" alt="logo">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#w0-collapse"
                        aria-controls="w0-collapse" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                <div id="w0-collapse" class="collapse navbar-collapse collapse-dark">
                    <ul id="w1" class="navbar-nav me-auto mb-2 mb-md-0 nav">
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->params['Home'][$lang] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?= Url::to(['site/about']) ?>"><?= Yii::$app->params['About'][$lang] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?= Url::to(['cars/index']) ?>"><?= Yii::$app->params['Categories'][$lang] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"
                               href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->params['Destinations'][$lang] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?= Url::to(['site/contact']) ?>"><?= Yii::$app->params['Contact'][$lang] ?></a>
                        </li>
                        <?= MultiLanguageWidget::widget([
                            'addCurrentLang' => true, // add current lang
                            'calling_controller' => $this->context,
                            'image_type' => 'rounded', // classic or rounded
                            'link_home' => true, // true or false
                            'widget_type' => 'classic', // classic or selector
                            'width' => '28'
                        ]); ?>
                    </ul>
                </div>
        </nav>
    </header>
    <main role="main" class="flex-shrink-0">
        <?php /*= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) */ ?>
        <?= $content ?>
    </main>

    <footer class="footer mt-auto text-muted">
        <div class="container">
            <div class="row mt-5 justify-content-between">
                <div class="col-md-3 col-sm-12 my-xs-5 ">
                    <div class="footer-logo">
                        <a href="<?= Yii::$app->homeUrl ?>">
                            <img src="<?= $baseUrl . '/img/footer-logo.png' ?>" alt="footer-logo">
                        </a>
                    </div>
                    <div class="social-icons">
                        <ul>
                            <li>
                                <a href="https://t.me/silkroad_samarkand" target="_blank">
                                    <i class="bi bi-telegram"></i><?=Yii::$app->params['Telegram'][$lang]?></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/silkroadsamarkand/" target="_blank">
                                    <i class="bi bi-instagram"></i><?=Yii::$app->params['Instagram'][$lang]?></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/silkroadresort/" target="_blank">
                                    <i class="bi bi-facebook"></i><?=Yii::$app->params['Facebook'][$lang]?></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@silkroadsamarkand" target="_blank">
                                    <i class="bi bi-youtube"></i><?=Yii::$app->params['Youtube'][$lang]?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 my-xs-5 ">
                    <div class="footer-title">
                        <h2><?=Yii::$app->params['Our Contact'][$lang]?></h2>
                    </div>
                    <div class="footer-info">
                        <ul>
                            <li>
                                <?=Yii::$app->params['address'][$lang]?>
                            </li>
                            <li>

                                <span><?=Yii::$app->params['Booking Number'][$lang]?>:</span> <br>
                                <a href="tel:+998946700101">+998 (94) 670-01-01</a></li>
                            <li>
                                <span><?=Yii::$app->params['placeholder_email'][$lang]?></span>:<br> <a style="display: block; width: 102%;"
                                                           href="mailto:svyatoslav.kipin@silkroad-samarkand.com">svyatoslav.kipin@silkroad-samarkand.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 my-xs-5 ">
                    <div class="footer-title">
                        <h2><?=Yii::$app->params['Navigation'][$lang]?></h2>
                    </div>
                    <div class="footer-info">
                        <ul>
                            <li>
                                <a href="<?=Yii::$app->homeUrl?>"><?=Yii::$app->params['Home'][$lang]?></a>
                            </li>
                            <li>
                                <a href="<?=Url::to(['site/about'])?>"><?=Yii::$app->params['About'][$lang]?></a>
                            </li>
                            <li>
                                <a href="<?=Url::to(['site/contact'])?>"><?=Yii::$app->params['Contact'][$lang]?></a>
                            </li>
                            <li>
                                <a href="<?=Url::to(['cars/index'])?>"><?=Yii::$app->params['Categories'][$lang]?></a>
                            </li>
                            <li>
                                <a href="<?=Url::to(['site/politics'])?>"><?=Yii::$app->params['Politics'][$lang]?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
