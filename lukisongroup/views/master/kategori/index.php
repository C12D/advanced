<?php

use yii\helpers\Html;
use kartik\grid\GridView;

//use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\master\KategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>


<div class="kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
<?php 
	$gridColumns = [
		['class' => 'yii\grid\SerialColumn'],

				'NM_KATEGORI',
				'NOTE:ntext',

				['class' => 'yii\grid\ActionColumn'],
	];

	echo Yii::$app->gv->grview($gridColumns,$dataProvider,$searchModel, 'Kategori', 'kategori',$this->title);
	
	/*
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
	'pjax'=>true,
    'toolbar' => [
        '{export}',
    ],
	'panel' => [
		'heading'=>'<h3 class="panel-title">'. Html::encode($this->title).'</h3>',
		'type'=>'warning',
		'before'=>Html::a('<i class="fa fa-plus fa-fw"></i> Kategori', ['create'], ['class' => 'btn btn-warning']),
		'showFooter'=>false,
	],		
	
	'export' =>['target' => GridView::TARGET_BLANK],
	'exportConfig' => [
		GridView::PDF => [ 'filename' => 'Kategori-'.date('ymdHis') ],
		GridView::EXCEL => [ 'filename' => 'Kategori-'.date('ymdHis') ],
	],
]);
	*/
	
?>


</div>
