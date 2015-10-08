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
	//$Combo_Corp = ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_ID','CORP_NM');
	//$Combo_Dept = ArrayHelper::map(Dept::find()->orderBy('SORT')->asArray()->all(), 'DEP_ID','DEP_NM');
	//$Combo_Jab = ArrayHelper::map(Jabatan::find()->orderBy('SORT')->asArray()->all(), 'JAB_ID','JAB_NM');
	//$Combo_Status = ArrayHelper::map(Status::find()->orderBy('SORT')->asArray()->all(), 'STS_ID','STS_NM');
	
	$Combo_Corp = ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_NM','CORP_NM');
	$Combo_Dept = ArrayHelper::map(Dept::find()->orderBy('SORT')->asArray()->all(), 'DEP_NM','DEP_NM');
	$Combo_SubDept= ArrayHelper::map(Deptsub::find()->orderBy('SORT')->asArray()->all(), 'DEP_SUB_NM','DEP_SUB_NM');
	$Combo_GrpFnc = ArrayHelper::map(Groupfunction::find()->orderBy('SORT')->asArray()->all(), 'GF_NM','GF_NM');
	$Combo_Seq = ArrayHelper::map(Groupseqmen::find()->orderBy('SEQ_NM')->asArray()->all(), 'SEQ_NM','SEQ_NM');
	$Combo_Jab = ArrayHelper::map(Jobgrade::find()->orderBy('SORT')->asArray()->all(), 'JOBGRADE_NM','JOBGRADE_NM');
	$Combo_Status = ArrayHelper::map(Status::find()->orderBy('SORT')->asArray()->all(), 'STS_NM','STS_NM');
	
	$Corp_MDL = Corp::find()->where(['CORP_ID'=>$model->EMP_CORP_ID])->orderBy('SORT')->one();
	$Dept_MDL = Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('SORT')->one();
	$Jabatan_MDL = Jobgrade::find()->where(['JOBGRADE_ID'=>$model->JOBGRADE_ID])->orderBy('SORT')->one();
	$Status_MDL = Status::find()->where(['STS_ID'=>$model->EMP_STS])->orderBy('SORT')->one();
	$Val_Corp=$Corp_MDL->CORP_NM;
	$Val_Dept=$Dept_MDL->DEP_NM;
	$Val_Jabatan=$Jabatan_MDL->JOBGRADE_NM;
	$Val_Status=$Status_MDL->STS_NM;
	
	$attribute = [
		[
			'group'=>true,
			'label'=>'SECTION 1: Identification Information',
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
			'label'=>'SECTION 1: Identification Information',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
		[ // Coorporation - Author: -ptr.nov-
			'attribute' =>'EMP_CORP_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_Corp, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				//'data'=>ArrayHelper::map(Author::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				//'data'=>ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_ID','CORP_NM'),
				'data'=>$Combo_Corp ,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],
		//	'inputContainer' => ['class'=>'col-sm-3'],
			//'inputWidth'=>'40%'
		],
		[ // Department - Author: -ptr.nov-
			'attribute' =>'DEP_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_Dept, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=>$Combo_Dept ,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],
			//'inputWidth'=>'40%'
		//	'inputContainer' => ['class'=>'col-sm-3'],
		],				
		[// Jabatan - Author: -ptr.nov-
			'attribute' =>'JOBGRADE_ID',
			'format'=>'raw',
			'value'=>Html::a($Val_Jabatan, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=>$Combo_Jab,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],
			//'inputContainer' => ['class'=>'col-sm-3'],
			//'inputWidth'=>'40%'
		],				
		[// Jabatan - Author: -ptr.nov-
			'attribute' =>'EMP_STS',
			'format'=>'raw',
			'value'=>Html::a($Val_Status, '#', ['class'=>'kv-author-link']),
			'type'=>DetailView::INPUT_SELECT2, 
			'widgetOptions'=>[
				'data'=>$Combo_Status,
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
			'label'=>'SECTION 1: Identification Information',
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
	

