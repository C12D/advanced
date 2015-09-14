<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lukisongroup\models\master\Tipebarang */

$this->title = 'Buat Tipe Barang';
$this->params['breadcrumbs'][] = ['label' => 'Tipe Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="tipebarang-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
