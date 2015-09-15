<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Distributor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distributor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_DISTRIBUTOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NM_DISTRIBUTOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TLP1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TLP2')->textInput(['maxlength' => true, 'value'=> '0']) ?>

    <?= $form->field($model, 'FAX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true])->input('email') ?>

    <?= $form->field($model, 'WEBSITE')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'STATUS')->dropDownList(['' => ' -- Silahkan Pilih --', '0' => 'Tidak Aktif', '1' => 'Aktif']) ?>

    <?= $form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>
	
    <?= $form->field($model, 'CREATED_BY')->hiddenInput(['value'=>Yii::$app->user->identity->username])->label(false) ?>

	

	<!-- 
    < ?= $form->field($model, 'STATUS')->textInput() ?>


    < ?= $form->field($model, 'createAt')->textInput(['maxlength' => true]) ?>

    < ?= $form->field($model, 'updateAt')->textInput(['maxlength' => true]) ?>

    < ?= $form->field($model, 'DATA_ALL')->textInput(['maxlength' => true]) ?>
-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
