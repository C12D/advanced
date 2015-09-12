<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\UnitbarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unit';
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'ESM Request Order';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_esm';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>


<div class="unitbarang-index">

    <?php 
	$gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'KD_UNIT',
            'NM_UNIT',
            'QTY',
            'SIZE',
            ['class' => 'yii\grid\ActionColumn','template' => '{view} {update}'],
        ]; 
	echo Yii::$app->gv->grview($gridColumns,$dataProvider,$searchModel, 'Unit', 'unit',$this->title);
	
	?>
</div>