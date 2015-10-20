<?php

use kartik\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use kartik\markdown\Markdown;

use lukisongroup\models\hrd\Groupfunction;
use lukisongroup\models\hrd\Groupseqmen;
use lukisongroup\models\hrd\Jobgrade;


$form = ActiveForm::begin(['id' => 'grading-form-id','type' => ActiveForm::TYPE_HORIZONTAL]);
	$GradingInput= FormGrid::widget([
		'model'=>$model,
		'form'=>$form,
		'autoGenerateColumns'=>true,
		'rows'=>[	
			[
				'columns'=>1,
				'attributes'=>[
					// GROUP FUNCTION - Author: -ptr.nov-
					'GF_ID'=>[
						'label'=>'GRP FUNCTION',
						'type'=>Form::INPUT_DROPDOWN_LIST , 
						'items'=>ArrayHelper::map(Groupfunction::find()->orderBy('SORT')->asArray()->all(), 'GF_ID','GF_NM'),
						'options' => [ 'id'=>'Groupfnc-id'],
						'hint'=>'Pilih Group Function',
						'columnOptions'=>['colspan'=>6],
					],
					// GROUP SEQMEN - Author: -ptr.nov-
					'SEQ_ID'=>[
						'label'=>'GRP SEQMEN',
						'type'=>Form::INPUT_DROPDOWN_LIST , 
						'items'=>ArrayHelper::map(Groupseqmen::find()->orderBy('SEQ_NM')->asArray()->all(), 'SEQ_ID','SEQ_NM'),
						'options' => [ 'id'=>'Groupseq-id'],
						'hint'=>'Pilih Group Sequen',
						'columnOptions'=>['colspan'=>6],
					],
					//JOBGRADE - Author: -ptr.nov-
					'JOBGRADE_ID'=>[
						'label'=>'GRADING',
						'type'=>Form::INPUT_DROPDOWN_LIST , 
						'items'=>ArrayHelper::map(Jobgrade::find()->orderBy('SORT')->asArray()->all(), 'JOBGRADE_ID','JOBGRADE_NM'),
						'options' => [ 'id'=>'grading-id'],
						'hint'=>'Pilih Grading Karyawan',
						'columnOptions'=>['colspan'=>6],
					],
					//SORT - Author: -ptr.nov-
					'SORT'=>[
						'type'=>Form::INPUT_TEXT, 
						'options'=>['placeholder'=>'Enter First Name...'],
						'columnOptions'=>['colspan'=>6],
					],
					//DESCRIPTION - Author: -ptr.nov-					
					'JOBGRADE_DCRP'=>[
						'label'=>'DCRP',
						'type'=>Form::INPUT_TEXT, 
						'options'=>['placeholder'=>'Enter Last Name...'],
						'columnOptions'=>['colspan'=>6],
					],
					
					'UPDATED_TIME'=>[
							'id'=>'tgl1',
							'type'=>Form::INPUT_WIDGET,
							'widgetClass'=>'\kartik\widgets\DatePicker',
							'options' => [
								//'placeholder' => 'Input Join Date  ...',
								'pluginOptions' => [
									'autoclose'=>true,
									'format' => 'yyyy-mm-dd',
									'todayHighlight' => true
								],
							],
							'hint'=>'Enter Join Date (yyyy-mm-dd)',
							'columnOptions'=>['colspan'=>6],
					],
					
				],
			],
			[
				/*SUBMMIT Action Author: -ptr.nov-*/
				'columns'=>1,
					'attributes'=>[ 
						'actions'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW, 
								'value'=>  '<div style="text-align: right; margin-top: 20px">' . 
									Html::resetButton('Reset', ['class'=>'btn btn-info']) . ' ' .
									Html::submitButton('Save', ['class'=>'btn btn-success']) . ' ' . 
									Html::submitButton('Close', ['class'=>'btn btn-primary']) . 
									//Html::a('<button type="button" class="btn btn-primary btn-xs">Submit</button>', ['/hrd/jobgrademodul/create'], [ 'data' => [ 'method' => 'post', 'params' => [ 'action' => 'create' ] ] ]) .' '.
									//Html::a('<button type="button" class="btn btn-primary btn-xs">Close</button>', ['/hrd/jobgrademodul/create'], 'data-dismiss'='modal') .
									'</div>'
						],
					],				
				
			],
			
		]	  
	]);

	/*Panel List Group*/
	echo Html::listGroup([
		 [
			 'content' => ['heading' => 'INPUT - GRADING MODULE'],
			 'url' => '#',
			 'badge' => '@LukisonGroup',
			 'active' => true
		 ],
		 [
			 'content' => $GradingInput,

		 ],
	]);
           
ActiveForm::end();
?>