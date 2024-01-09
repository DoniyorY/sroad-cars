<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>



<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fullname')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'role_id')->dropDownList(Yii::$app->params['user_role']) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'username')->textInput() ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
</div>


<?php ActiveForm::end(); ?>


