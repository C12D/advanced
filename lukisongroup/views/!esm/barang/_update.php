<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\esm\Unitbarang;
use app\models\esm\Distributor;
use app\models\esm\Barangmaxi;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_BARANG')->textInput(['maxlength' => true]) ?>

	<?php
		$drop = ArrayHelper::map(Barangmaxi::find()->all(), 'KD_BARANG', 'NM_BARANG');
	?>
    <?= $form->field($model, 'NM_BARANG')->dropDownList($drop,['prompt'=>' -- Pilih Salah Satu --']) ?>
    <?php //= $form->field($model, 'NM_BARANG')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'KDUNIT')->textInput(['maxlength' => true]) ?>
	<?php
		$drop = ArrayHelper::map(Unitbarang::find()->all(), 'ID', 'NM_UNIT');
	?>
    <?= $form->field($model, 'KD_UNIT')->dropDownList($drop,['prompt'=>' -- Pilih Salah Satu --']) ?>
	
    <?= $form->field($model, 'KD_SUPPLIER')->textInput(['maxlength' => true]) ?>

	<?php
		$drop = ArrayHelper::map(Distributor::find()->all(), 'KD_DISTRIBUTOR', 'NM_DISTRIBUTOR');
	?>
    <?= $form->field($model, 'KD_DISTRIBUTOR')->dropDownList($drop,['prompt'=>' -- Pilih Salah Satu --']) ?>
    <?php //= $form->field($model, 'kdDbtr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HPP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HARGA')->textInput() ?>

    <?= $form->field($model, 'BARCODE')->textInput() ?>

    <?= $form->field($model, 'NOTE')->textInput() ?>

    <?= $form->field($model, 'STATUS')->dropDownList(['' => ' -- Silahkan Pilih --', '0' => 'Tidak Aktif', '1' => 'Aktif']) ?>

    <?php // $form->field($model, 'createdBy')->textInput(['value'=>Yii::$app->user->identity->username]) ?>
    <!--?= $form->field($model, 'createdBy')->textInput() ?-->

    <?php //= $form->field($model, 'createdAt')->textInput() ?>

    <?=  $form->field($model, 'UPDATED_AT')->hiddenInput(['value'=>Yii::$app->user->identity->username])->label(false)  //= $form->field($model, 'updateAt')->textInput() ?>

    <?php //= $form->field($model, 'DATA_ALL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
