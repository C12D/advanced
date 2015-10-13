<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\system\erpmodul\Mdlpermission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mdlpermission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MODUL_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'CREATE')->textInput() ?>

    <?= $form->field($model, 'EDIT')->textInput() ?>

    <?= $form->field($model, 'TOMBOL1')->textInput() ?>

    <?= $form->field($model, 'TOMBOL2')->textInput() ?>

    <?= $form->field($model, 'TOMBOL3')->textInput() ?>

    <?= $form->field($model, 'TOMBOL4')->textInput() ?>

    <?= $form->field($model, 'TOMBOL5')->textInput() ?>

    <?= $form->field($model, 'TOMBOL6')->textInput() ?>

    <?= $form->field($model, 'TOMBOL7')->textInput() ?>

    <?= $form->field($model, 'TOMBOL8')->textInput() ?>

    <?= $form->field($model, 'TOMBOL9')->textInput() ?>

    <?= $form->field($model, 'TOMBOL10')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
