<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\master\Barangumum */

$this->title = 'Update Barang Umum : ' . ' ' . $model->KD_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang Umum', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID, 'KD_BARANG' => $model->KD_BARANG]];
$this->params['breadcrumbs'][] = 'Update';



$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="barangumum-update">

    <h3><?= Html::encode($this->title) ?></h3>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
