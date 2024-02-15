<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin(['action' => Url::to(['create-owl'])]) ?>
<?= $form->field($model, 'car_id')->textInput(['value' => $car_id, 'hidden' => true])->label(false) ?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'title_ru')->textInput() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'title_en')->textInput() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'title_uz')->textInput() ?>
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
    <div class="col-md-6 mt-4">
        <?= $form->field($model, 'imageFile')->fileInput() ?>
    </div>
    <div class="col-md-6 mt-4">
        <?= \yii\helpers\Html::submitButton('Сохранить', ['class' => 'btn btn-success w-100']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>
