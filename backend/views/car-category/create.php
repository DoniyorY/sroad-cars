<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarCategory $model */

$this->title = 'Create Car Category';
$this->params['breadcrumbs'][] = ['label' => 'Car Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
