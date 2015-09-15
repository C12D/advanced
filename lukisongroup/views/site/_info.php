	<?php
	use kartik\helpers\Html;
	use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
	/*
	$attribute = [
		[
			'attribute' =>'EMP_ID',
			//'inputWidth'=>'20%'
			//'inputContainer' => ['class'=>'col-md-1'],
		],	
		[
			'attribute' =>	'EMP_NM',
			//'inputWidth'=>'40%'					
		],
		[
			'attribute' =>	'EMP_NM_BLK',
			//'inputWidth'=>'40%'
		],
		[
			'attribute' =>	'EMP_KTP' ,
		],
		[	
			'attribute' =>	'EMP_ALAMAT' ,
		],
		[
			'attribute' =>	'EMP_ZIP' ,
		],
		[
			'attribute' =>	'EMP_TLP' ,
		],
		[
			'attribute' =>	'EMP_HP' ,
		],		
	];
	$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

	$test1= DetailView::widget([
		'model' => $model,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'panel'=>[
			'heading'=>$model->EMP_NM . ' '.$model->EMP_NM_BLK,
			'type'=>DetailView::TYPE_INFO,
		],	
		
			'attributes'=>$attribute,
		
		
		'deleteOptions'=>[
			'url'=>['delete', 'id' => $model->EMP_ID],
			'data'=>[
				'confirm'=>Yii::t('app', 'Are you sure you want to delete this record?'),
				'method'=>'post',
			],
		],
	]);		
ActiveForm::end();	
	
	*/
	
	?>
	
	<div class="col-xs-3 col-sm-2 col-dm-3  "  style="margin-left:0 ;background:blue"  >
		<img src="<?= Yii::getAlias('@HRD_EMP_UploadUrl') .'/'. $model->EMP_IMG; ?>" class="img-thumbnail" alt="Cinque Terre" width="auto" height="auto"/>
    </div>
    <div class="col-lg-2"  style="margin-left:0 ;background:blue"  >
		<img src="<?= Yii::getAlias('@HRD_EMP_UploadUrl') .'/'. $model->EMP_IMG; ?>" class="img-thumbnail" alt="Cinque Terre" width="80px" height="80px"/>
    </div>
	<div class="col-lg-4  col-dm-4 col-sm-5 col-xs-9"  style="margin-left:0 ;background:red">
      <table id="table1" style="display:block;">
		<tr>
			<td width="auto"  valign="top">Name  </td>
			<td width="1px"  valign="top" style="padding-left: 10px"> :</td>
			<td  width="auto">This table will  sdas dasd asdasdas</td>
		</tr>
		<tr>
			<td width="auto"> table </td>
			<td width="1px" style="padding-left: 10px"> :</td>
			<td  width="auto">This table will  </td>
		</tr>
		<tr>
			<td width="auto"> table </td>
			<td width="1px" style="padding-left: 10px"> :</td>
			<td  width="auto">This table will  </td>
		</tr>
	</table>
    </div>
	<div class=" col-lg-4 col-dm-4 col-sm-5 col-xs-12"  style="margin-left:0 ;background:blue"  >
      <table id="table1" style="display:block;">
		<tr>
			<td width="auto"> table </td>
			<td width="1px" style="padding-left: 10px"> :</td>
			<td  width="auto">This table will  </td>
		</tr>
		<tr>
			<td width="auto"> table </td>
			<td width="1px" style="padding-left: 10px"> :</td>
			<td  width="auto">This table will  </td>
		</tr>
		<tr>
			<td width="auto"> table </td>
			<td width="1px" style="padding-left: 10px"> :</td>
			<td  width="auto">This table will  </td>
		</tr>
	</table>
    </div>
	<div class="col-lg-2"  style="margin-left:0 ;background:red">
	</div>