<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\esm\ro\Requestorder;
use app\models\esm\ro\RequestorderSearch;


use yii\helpers\ArrayHelper;
use app\models\master\Perusahaan;
$this->sideMenu = 'esm';
/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Requestorder */
/* @var $form yii\widgets\ActiveForm */


        $model = new Requestorder();

?>

<div class="requestorder-form">

    <?php // $form = ActiveForm::begin(); ?>
	<?php
		$form = ActiveForm::begin([
			'method' => 'post',
			'action' => ['esm/requestorder/create'],
		]);
	?>
	
<div class="row">
	<div class="col-md-6 col-sm-6"><?= $form->field($model, 'KD_RO')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-6 col-sm-6"><?= $form->field($model, 'ID_USER')->textInput(['maxlength' => true]) ?></div>
</div>

<div class="row">
	<div class="col-md-6 col-sm-6"><?= $form->field($model, 'KD_CAB')->textInput(['maxlength' => true]) ?></div>
	
	<?php
		$drop = ArrayHelper::map(Perusahaan::find()->all(), 'KD_CORP', 'NM_CORP');
	?>
	<div class="col-md-6 col-sm-6"><?= $form->field($model, 'KD_CORP')->dropDownList($drop,['prompt'=>' -- Pilih Salah Satu --'])->label('Perusahaan') ?></div>
</div>

	
    

    

    

    

    <?php //= $form->field($model, 'KD_DEP')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'CREATED_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATED_ALL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA_ALL')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
