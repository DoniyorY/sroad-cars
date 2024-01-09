<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarManufacturer $model */

$this->title = 'Create Car Manufacturer';
$this->params['breadcrumbs'][] = ['label' => 'Car Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-manufacturer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
