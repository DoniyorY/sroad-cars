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
                            <a class="nav-link active"
                               href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->params['Categories'][$lang] ?></a>
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

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-end"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
