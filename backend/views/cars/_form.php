<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Cars $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'manufacture_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\CarManufacturer::find()->all(), 'id', 'name_ru'), ['prompt' => 'Выберите марку']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\CarCategory::find()->all(), 'id', 'name_ru'), ['prompt' => 'Выберите Категорию']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\CarType::find()->all(), 'id', 'name_ru'), ['prompt' => 'Выберите тип', 'value' => 0]) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'short_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'short_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'short_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'content_ru')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'ru',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]); ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'content_en')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'ru',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]); ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'content_uz')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'ru',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'capacity')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'baggage')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-3 mt-4">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
