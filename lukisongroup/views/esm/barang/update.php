<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\Barang */

$this->title = 'Ubah Barang : ' . ' ' . $model->KD_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';


$this->sideCorp = 'ESM Request Order';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_esm';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="barang-update">

    <h2><?= Html::encode($this->title) ?></h2>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div> 

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
