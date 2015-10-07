<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Jobgrade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobgrade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'JOBGRADE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JOBGRADE_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SORT')->textInput() ?>

    <?= $form->field($model, 'JOBGRADE_STS')->textInput() ?>

    <?= $form->field($model, 'JOBGRADE_DCRP')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
