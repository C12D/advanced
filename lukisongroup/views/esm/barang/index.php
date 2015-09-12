<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use lukisongroup\models\esm\Barang;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\esm\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'ESM Request Order';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_esm';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>


<div class="barang-index">
    <?php
	$gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],

            'KD_BARANG',
			'nmdbtr',
			'unitbrg',
			
			[
				'format' => 'raw',
				'value' => function ($model) {
					if ($model->STATUS == 1) {
						return '<i class="fa fa-check fa-lg ya" style="color:blue;" title="Aktif"></i>';
					} else if ($model->STATUS == 0) {
						return '<i class="fa fa-times fa-lg no" style="color:red;" title="Tidak Aktif" ></i>';
					} 
				},
			], 
            ['class' => 'yii\grid\ActionColumn'],
        ]; 
	
	
	echo Yii::$app->gv->grview($gridColumns,$dataProvider,$searchModel, 'Barang ESM', 'barang-esm',$this->title);
	
	?>
</div>

<p>
<i class="fa fa-check fa-sm" style="color:blue;" title="Aktif"></i> Aktif  &nbsp;&nbsp;&nbsp;&nbsp;
<i class="fa fa-times fa-sm" style="color:red;" title="Tidak Aktif" ></i> Tidak Aktif
</p>