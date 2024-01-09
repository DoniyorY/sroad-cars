<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);
$baseUrl = Yii::$app->request->baseUrl;
$new_contact = \common\models\Contact::find()->where(['status' => 0]);
$new_booking = \common\models\Booking::find()->where(['status' => 0]);
$contact_count = $new_contact->count();
$total_news_count = $contact_count + $new_booking->count();
Yii::$app->setHomeUrl(Yii::$app->getRequest()->getBaseUrl());
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" data-layout="vertical" data-topbar="light" data-sidebar="gradient-4"
          data-sidebar-size="lg" data-sidebar-image="img-3" data-preloader="disable" data-sidebar-visibility="show"
          data-layout-style="default" data-bs-theme="light" data-layout-width="fluid" data-layout-position="fixed">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="<?= Yii::$app->homeUrl ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?= $baseUrl . '/assets/' ?>images/logo-sm.png" alt="" height="22">
                        </span>
                                <span class="logo-lg">
                            <img src="<?= $baseUrl . '/assets/' ?>images/logo-dark.png" alt="" height="17">
                        </span>
                            </a>

                            <a href="<?= Yii::$app->homeUrl ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?= $baseUrl . '/assets/' ?>images/logo-sm.png" alt="" height="22">
                        </span>
                                <span class="logo-lg">
                            <img src="<?= $baseUrl . '/assets/' ?>images/logo-light.png" alt="" height="17">
                        </span>
                            </a>
                        </div>

                        <button type="button"
                                class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                                id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                       id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                      id="search-close-options"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                 aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                   aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                        class="mdi mdi-magnify"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown ms-1 topbar-head-dropdown header-item d-none">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="<?= $baseUrl . '/assets/' ?>images/flags/us.svg"
                                     alt="Header Language"
                                     height="20"
                                     class="rounded">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language py-2"
                                   data-lang="en"
                                   title="English">
                                    <img src="<?= $baseUrl . '/assets/' ?>images/flags/us.svg" alt="user-image"
                                         class="me-2 rounded"
                                         height="18">
                                    <span class="align-middle">English</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru"
                                   title="Russian">
                                    <img src="<?= $baseUrl . '/assets/' ?>images/flags/russia.svg" alt="user-image"
                                         class="me-2 rounded"
                                         height="18">
                                    <span class="align-middle">Русский</span>
                                </a>
                            </div>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                    data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                    class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-bell fs-22'></i>
                                <?php if ($total_news_count > 0): ?>
                                    <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"><?= $total_news_count ?><span
                                                class="visually-hidden">unread messages</span></span>
                                <?php endif; ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                 aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Уведомления </h6>
                                            </div>
                                            <?php if ($total_news_count > 0): ?>
                                                <div class="col-auto dropdown-tabs">
                                                    <span class="badge bg-light-subtle text-body fs-13"> <?= $total_news_count ?> </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                            id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab"
                                                   role="tab" aria-selected="true">
                                                    Все <?php if ($total_news_count > 0): ?>(<?= $total_news_count ?>)<?php endif; ?>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                                   aria-selected="false">
                                                    Контакты <?php if ($contact_count > 0): ?>(<?= $contact_count ?>)<?php endif; ?>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab"
                                                   aria-selected="false">
                                                    Бронирование <?php if ($new_booking->count() > 0): ?>(<?= $new_booking->count() ?>)<?php endif; ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="tab-content position-relative" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <?php foreach ($new_contact->all() as $item): ?>
                                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                                <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                    <i class='bx bx-message-square-dots'></i>
                                                </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="<?= Url::to(['contact/view', 'id' => $item->id]) ?>"
                                                               class="stretched-link">
                                                                <h6 class="mt-0 mb-2 fs-13 lh-base"><?= $item->fullname . ': ' . $item->subject ?>
                                                                </h6>
                                                            </a>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i> <?= date('d.m.Y / H:i', $item->created) ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php foreach ($new_booking->all() as $item): ?>
                                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="<?= Url::to(['booking/view', 'id' => $item->id]) ?>"
                                                               class="stretched-link">
                                                                <h6 class="mt-0 mb-2 lh-base"><?= $item->fullname . ': ' . 'Дата:' . date('d.m.Y', $item->booking_date) ?>
                                                                </h6>
                                                            </a>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i> <?= date('d.m.Y / H:i', $item->created) ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel"
                                         aria-labelledby="messages-tab">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <?php foreach ($new_contact->all() as $item): ?>
                                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                                <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                    <i class='bx bx-message-square-dots'></i>
                                                </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="<?= Url::to(['contact/view', 'id' => $item->id]) ?>"
                                                               class="stretched-link">
                                                                <h6 class="mt-0 mb-2 fs-13 lh-base"><?= $item->fullname . ': ' . $item->subject ?>
                                                                </h6>
                                                            </a>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i> <?= date('d.m.Y / H:i', $item->created) ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel"
                                         aria-labelledby="alerts-tab">
                                        <?php foreach ($new_booking->all() as $item): ?>
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3 flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="<?= Url::to(['booking/view', 'id' => $item->id]) ?>"
                                                           class="stretched-link">
                                                            <h6 class="mt-0 mb-2 lh-base"><?= $item->fullname . ': ' . 'Дата:' . date('d.m.Y', $item->booking_date) ?>
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> <?= date('d.m.Y / H:i', $item->created) ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                 src="<?= $baseUrl . '/assets/' ?>images/users/avatar-1.jpg"
                                 alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= Yii::$app->user->identity->fullname ?></span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?= Yii::$app->params['user_role'][Yii::$app->user->identity->role_id] ?></span>
                            </span>
                        </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Добро пожаловать</h6>
                                <a class="dropdown-item" href="<?= Url::to(['user/change-pass']) ?>"><i
                                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                            class="align-middle" data-key="t-change-pass">Сменить пароль</span></a>

                                <form method="post" action="<?= Url::to(['site/logout']) ?>">
                                    <input type="text" hidden name="<?= Yii::$app->request->csrfParam ?>"
                                           value="<?= Yii::$app->request->csrfToken ?>">
                                    <button class="dropdown-item">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                                class="align-middle" data-key="t-logout">Выйти</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="<?= Yii::$app->homeUrl ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= $baseUrl . '/assets/' ?>images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= $baseUrl . '/assets/' ?>images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="<?= Yii::$app->homeUrl ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= $baseUrl . '/assets/' ?>images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= $baseUrl . '/logo.svg' ?>" alt="" height="45">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                        id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Меню</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                               role="button"
                               aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span
                                        data-key="t-dashboards">Панель монторинга</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= Yii::$app->homeUrl ?>" class="nav-link"
                                           data-key="t-report"> Отчёт </a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarBooking" data-bs-toggle="collapse"
                               role="button"
                               aria-expanded="false" aria-controls="sidebarBooking">
                                <i class="ri-mail-line"></i> <span
                                        data-key="t-booking-settings">Данные по заявкам</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarBooking">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= \yii\helpers\Url::to(['booking/index']) ?>" class="nav-link"
                                           data-key="t-booking-header"> Заявки </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= \yii\helpers\Url::to(['contact/index']) ?>" class="nav-link"
                                           data-key="t-contact"> Контакты </a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span
                                    data-key="t-settings">Настройки</span>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/banner/index']) ?>" class="nav-link menu-link"
                               aria-expanded="false">
                                <i class="ri-map-2-line"></i> <span data-key="t-banner">Баннер</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/address/index']) ?>" class="nav-link menu-link"
                               aria-expanded="false">
                                <i class="ri-map-pin-line"></i> <span data-key="t-address">Адрес</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="sidebarUI">
                                <i class="ri-home-gear-line"></i> <span
                                        data-key="t-cars-settings">Настройки лодок</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="<?= Url::to(['cars/index']) ?>" class="nav-link"
                                                   data-key="t-boats">Машины</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?= Url::to(['car-category/index']) ?>" class="nav-link"
                                                   data-key="t-cars-category">Категории машин</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?= Url::to(['car-manufacturer/index']) ?>" class="nav-link"
                                                   data-key="t-cars-manufacture">Марки машин</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php if (Yii::$app->user->identity->role_id === 0): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#userUI" data-bs-toggle="collapse" role="button"
                                   aria-expanded="false" aria-controls="userUI">
                                    <i class="ri-folder-user-line"></i> <span
                                            data-key="t-contact"> Настройки сотрудников</span>
                                </a>
                                <div class="collapse menu-dropdown mega-dropdown-menu" id="userUI">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="<?= Url::to(['user/index']) ?>" class="nav-link"
                                                       data-key="t-contact">Сотрудники</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <?= $content ?>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script>
                                © Silk-Road.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Silk-Road
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Загрузка...</span>
            </div>
        </div>
    </div>

    <!-- on your view layout file HEAD section -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
