<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use lukisongroup\models\hrd\Corp;
use lukisongroup\models\hrd\Dept;
//use lukisongroup\models\hrd\Jabatan;
use lukisongroup\models\hrd\Status;
use lukisongroup\models\hrd\Deptsub;
use lukisongroup\models\hrd\Groupfunction;
use lukisongroup\models\hrd\Groupseqmen;
use lukisongroup\models\hrd\Jobgrade;

use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\icons\Icon;
use kartik\widgets\Growl;
use kartik\widgets\FileInput;

$this->sideCorp = 'HRM - Employee';             		/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_employee';               		/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'DetalView - Employee');   /* title pada header page */

?>


<?php	
	$Corp_MDL = Corp::find()->where(['CORP_ID'=>$model->EMP_CORP_ID])->orderBy('SORT')->one();
	$Dept_MDL = Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('SORT')->one();
	$DeptSub_MDL = Deptsub::find()->where(['DEP_SUB_ID'=>$model->DEP_SUB_ID])->orderBy('SORT')->one();
	$Gf_MDL = Groupfunction::find()->where(['GF_ID'=>$model->GF_ID])->orderBy('SORT')->one();
	$GSeqmen_MDL = Groupseqmen::find()->where(['SEQ_ID'=>$model->SEQ_ID])->one();
	$Jabatan_MDL = Jobgrade::find()->where(['JOBGRADE_ID'=>$model->JOBGRADE_ID])->orderBy('SORT')->one();
	$Status_MDL = Status::find()->where(['STS_ID'=>$model->EMP_STS])->orderBy('SORT')->one();
	
	$Val_Corp=$Corp_MDL->CORP_NM;
	$Val_Dept=$Dept_MDL->DEP_NM;	
	$Val_DeptSub=$DeptSub_MDL->DEP_SUB_NM;
	$Val_GF=$Gf_MDL->GF_NM;
	$Val_SQMEN=$GSeqmen_MDL->SEQ_NM;
	$Val_Jabatan=$Jabatan_MDL->JOBGRADE_NM;
	$Val_Status=$Status_MDL->STS_NM;
	
	$attribute = [
		[
			'group'=>true,
			'label'=>'Employee Identification',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
		[
			'attribute' =>	'upload_file' ,
			'label'=>'',
			//'value'=>('<img src =' . Yii::getAlias('@HRD_EMP_UploadUrl') .'/'. $model->EMP_IMG. ' height="100" width="100"' . '>' )
			'value'=>Yii::getAlias('@HRD_EMP_UploadUrl') .'/'.$model->EMP_IMG,
			'format'=>['image',['width'=>'100','height'=>'120']],
			//'format'=>'raw', 
			'type' => DetailView::INPUT_FILEINPUT,
			'widgetOptions'=>[
						'pluginOptions' => [
							'showPreview' => true,
							'showCaption' => false,
							'showRemove' => false,
							'showUpload' => false
						],
					
			],
			//'inputContainer' => ['class'=>'col-md-2'],
			//'format' => 'html', //'format' => 'image',
			//'value'=>function($data){
			//			return Html::img(Yii::getAlias('HRD_EMP_UploadUrl') . '/'. $data->EMP_IMG, ['width'=>'40']);
			//		},
		],
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
			'group'=>true,
			'label'=>'Coorporate Information',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
		
		[ 
			// Coorporation - Author: -ptr.nov-
			'label'=>'Coorporate',
			'attribute' =>'EMP_CORP_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_Corp, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=> ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_ID','CORP_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],
		],
		
		[ // DEPERTMENT - Author: -ptr.nov-
			'label'=>'Department',
			'attribute' =>'DEP_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_Dept, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=> ArrayHelper::map(Dept::find()->orderBy('SORT')->asArray()->all(), 'DEP_ID','DEP_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],			
		],			
		
		[ // SUB DEPARTMENT - Author: -ptr.nov-
			'label'=>'Department Sub',
			'attribute' =>'DEP_SUB_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_DeptSub, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=> ArrayHelper::map(Deptsub::find()->orderBy('SORT')->asArray()->all(), 'DEP_SUB_ID','DEP_SUB_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],			
		],	
		[ // GROUP FUNCTION - Author: -ptr.nov-
			'label'=>'Group Function',
			'attribute' =>'GF_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_GF, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=> ArrayHelper::map(Groupfunction::find()->orderBy('SORT')->asArray()->all(), 'GF_ID','GF_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],			
		],	
		[ // GROUP SEQMEN - Author: -ptr.nov-
			'label'=>'Group Seqmen',
			'attribute' =>'SEQ_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_SQMEN, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=> ArrayHelper::map(Groupseqmen::find()->orderBy('SEQ_NM')->asArray()->all(), 'SEQ_ID','SEQ_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],			
		],			
	
		[// JOBGRADE - Author: -ptr.nov-
			'label'=>'Grading',
			'attribute' =>'JOBGRADE_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_Jabatan, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=>ArrayHelper::map(Jobgrade::find()->orderBy('SORT')->asArray()->all(), 'JOBGRADE_ID','JOBGRADE_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],
			//'inputContainer' => ['class'=>'col-sm-3'],
			//'inputWidth'=>'40%'
		],				
		[// STATUS - Author: -ptr.nov-
			'attribute' =>'EMP_STS',
			'format'=>'raw',
			'value'=>Html::a($Val_Status, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=>ArrayHelper::map(Status::find()->orderBy('SORT')->asArray()->all(), 'STS_ID','STS_NM'),
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],
			//'inputContainer' => ['class'=>'col-sm-3'],
			//'inputWidth'=>'40%'
			
		],
		[
			'attribute' =>'EMP_JOIN_DATE',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>['format'=>'yyyy-mm-dd']
			],
			//'inputContainer' => ['class'=>'col-sm-3'],
			//'inputWidth'=>'40%'
		],
		[
			'attribute' =>'EMP_RESIGN_DATE',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>['format'=>'yyyy-mm-dd']
			],
			//'inputWidth'=>'40%'
		//	'inputContainer' => ['class'=>'col-sm-3'],
		],
		[
			'group'=>true,
			'label'=>'Employee Data Information',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
		
		//Employe Profile - Author: -ptr.nov-
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
		[
			'attribute' =>	'EMP_GENDER',
		],
		[
			'attribute' =>	'EMP_TGL_LAHIR',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>['format'=>'yyyy-mm-dd']
			],
			'inputWidth'=>'40%'
		],
		[
			'attribute' =>	'EMP_EMAIL' ,
		],
		/*
		[
			'attribute' =>	'GRP_NM',
		],
		*/
		
	];
	

$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

	echo DetailView::widget([
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
?>
	

