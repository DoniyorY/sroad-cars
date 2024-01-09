<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarCategory $model */

$this->title = 'Update Car Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
