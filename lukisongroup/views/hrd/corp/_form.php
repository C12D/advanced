<?php 
use kartik\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use kartik\markdown\Markdown;

$form = ActiveForm::begin(['id' => 'dept-id','type' => ActiveForm::TYPE_HORIZONTAL]);

$CorpInput= FormGrid::widget([
	'id'=>'fg-dept',
	'model'=>$model,
	'form'=>$form,
	'autoGenerateColumns'=>true,
	'rows'=>[
		[
			'contentBefore'=>'<legend class="text-info"><small>DEPARTMENT IDENTITY</small></legend>',	
			'columns'=>1,
			'autoGenerateColumns'=>false,
			'attributes'=>[ 
				'employe_identity' => [
					'label'=>'Corp.ID',
					'columns'=>5,
					'attributes'=>[
						'CORP_ID'=>[
							'type'=>Form::INPUT_TEXT,
							'Form::SIZE_LARGE', 							
							'options'=>[
								//'staticValue'=>'<large><bold>'.$nl.'</bold></large>',
								//'staticValue'=>$nl,
								//'value'=>$nl,
								//'staticOnly'=>true,
							],
							'columnOptions'=>['colspan'=>3],
							
							//'label'=>$nl,
							//'value'=>$nl,
						],
						'CORP_NM'=>[
							'type'=>Form::INPUT_TEXT, 
							'options'=>['placeholder'=>'Coorporate Name...'],
							'columnOptions'=>['colspan'=>4],
						],
						'CORP_DCRP'=>[
							'type'=>Form::INPUT_TEXTAREA, 
							'options'=>['placeholder'=>'Coorporate Description ...'],
							'columnOptions'=>['colspan'=>4],
						],
						'SORT'=>[
							'type'=>Form::INPUT_TEXT, 
							'options'=>['placeholder'=>'SORT...'],
							'columnOptions'=>['colspan'=>4],
						],						
					]
				],
			],
		],		
		
		[ //-Action Author: -ptr.nov-
			'attributes'=>[ 
				'actions'=>[    // embed raw HTML content
						'type'=>Form::INPUT_RAW, 
						'value'=>  '<div style="text-align: right; margin-top: 20px">' . 
							Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
							Html::submitButton('Submit', ['class'=>'btn btn-primary']) . 
							'</div>'
				],
			],
		],
	]
  
]);


/*Panel List Group*/
	echo Html::listGroup([
		 [
			 'content' => 'COORPORATE',
			 'url' => '#',
			 'badge' => '',
			 'active' => true
		 ],
		 [
			 'content' => $CorpInput,

		 ],
	]);
ActiveForm::end();


