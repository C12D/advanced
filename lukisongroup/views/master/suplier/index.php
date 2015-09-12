<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use lukisongroup\models\esm\perusahaan;


/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\esm\SuplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suplier';
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>

<div class="suplier-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php 
	$gridColumns = [
		['class' => 'yii\grid\SerialColumn'],
            'KD_SUPPLIER',
            'NM_SUPPLIER',
            'ALAMAT:ntext',
            'KOTA',
			'nmgroup',
		['class' => 'yii\grid\ActionColumn'],
	];

	echo Yii::$app->gv->grview($gridColumns,$dataProvider,$searchModel, 'Suplier', 'suplier',$this->title);
	
?>

</div>
