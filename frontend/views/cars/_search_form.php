<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$lang=Yii::$app->language;
?>

<?php $form = ActiveForm::begin(['action' => Url::to(['cars/index']), 'method'=>'get']); ?>
<div class="row align-items-center">
    <div class="col-md-2 mt-2">
        <h2>
            <?= Yii::$app->params['filter'][$lang] ?>
        </h2>
    </div>
    <div class="col-md-3">
        <?=$form->field($model,'car_id')->dropDownList(Yii::$app->params['status'],['class'=>'js-title-select2 w-100','prompt'=>'Выберите марку'])->label(Yii::$app->params['Название машины'][$lang])?>
    </div>
    <div class="col-md-3">
        <?=$form->field($model,'to_id')->dropDownList(Yii::$app->params['status'],['class'=>'js-to-select2 w-100','prompt'=>'Выберите направление'])->label(Yii::$app->params['Направление'][$lang])?>
    </div>
    <div class="col-md-3">
        <?=$form->field($model,'people_count')->textInput(['type'=>'number'])->label(Yii::$app->params['Количество пассажиров'][$lang])?>
    </div>
    <div class="col-md-1 mt-4">
        <button type="submit" class="btn btn-sroad w-100">
            <?= Yii::$app->params['search'][$lang] ?>
        </button>
    </div>
</div>
<?php ActiveForm::end() ?>
