<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* TABLE CLASS DEVELOPE -> |DROPDOWN,PRIMARYKEY-> ATTRIBUTE */
use app\models\hrd\Dept;
/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use kartik\detail\DetailView;
//use backend\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
//AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

//$this->sideCorp = 'LG Widget';                                   /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = $ctrl_chat;                           /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Chating');     			/* title pada header page */
$this->params['breadcrumbs'][] = $this->title;          /* belum di gunakan karena sudah ada list sidemenu, on plan next*/
/*
	$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

	$coba= DetailView::widget([
		'model' => $model,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'panel'=>[
			'heading'=>$model->EMP_NM . ' '.$model->EMP_NM_BLK,
			'type'=>DetailView::TYPE_INFO,
		],	
		
			'attributes'=>['EMP_ID',],
		
		
		'deleteOptions'=>[
			'url'=>['delete', 'id' => $model->EMP_ID],
			'data'=>[
				'confirm'=>Yii::t('app', 'Are you sure you want to delete this record?'),
				'method'=>'post',
			],
		],
		
	]);		
ActiveForm::end();
	
    Modal::begin([
        'id' => 'chating',
        'header' => '<h4>Hello world</h4>'
    ]);
	
	        echo $coba;
		
    Modal::end();
 
 */
?>

<div class="body-content">
    <div class="row" style="padding-left: 5px; padding-right: 5px">
		<div class="col-sm-3"></div>
        <div class="col-sm-4 col-md-4 col-lg-4 ">
           <img src="<?php echo Yii::$app->urlManager->baseUrl.'/upload/image/underc1.jpg'; ?>"  height="200" width="300">           
        </div>
    </div>
</div>