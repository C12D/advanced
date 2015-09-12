<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use lukisongroup\models\master\Barangumum;

//use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\master\BarangumumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

$this->title = 'Barang Umum';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="barangumum-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php 
$gridColumns = [
	['class' => 'yii\grid\SerialColumn'],
		'KD_BARANG',
		'NM_BARANG',
		'nmtype',
		'nmktegori',
	['class' => 'yii\grid\ActionColumn'],
];

	echo Yii::$app->gv->grview($gridColumns,$dataProvider,$searchModel, 'Barang Umum', 'BarangUmum',$this->title);
	

?>


</div>
