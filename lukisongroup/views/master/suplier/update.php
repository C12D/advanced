<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\Suplier */

$this->title = 'Update Suplier: ' . ' ' . $model->NM_SUPPLIER;
$this->params['breadcrumbs'][] = ['label' => 'Suplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER]];
$this->params['breadcrumbs'][] = 'Update';

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="suplier-update">

    <h3><?= Html::encode($this->title) ?></h3>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
