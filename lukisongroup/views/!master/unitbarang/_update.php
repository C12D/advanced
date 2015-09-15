<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\master\Unitbarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitbarang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_UNIT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NM_UNIT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SIZE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WIGHT')->textInput() ?>

    <?= $form->field($model, 'COLOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'UPDATED_BY')->hiddenInput(['value'=>Yii::$app->user->identity->username])->label(false) ?>
    <?php //= $form->field($model, 'CREATED_BY')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'CREATED_AT')->textInput() ?>

    <?php //= $form->field($model, 'UPDATED_BY')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'UPDATED_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->dropDownList(['' => ' -- Silahkan Pilih --', '0' => 'Tidak Aktif', '1' => 'Aktif']) ?>
    <?php //= $form->field($model, 'STATUS')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
