<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\master\Tipebarang */

$this->title = 'Detail Tipe Barang : '.$model->NM_TYPE;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="tipebarang-view">

<h2><?= Html::encode($this->title) ?></h2>
<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div>

<?php
	if($model->STATUS == '1'){
		$stat = "Aktif";
	} else {
		$stat = "Tidak Aktif";
	}
 ?>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NM_TYPE',
            'NOTE:ntext',
			[
				'label' => 'Status',
				'value' => $stat,
			],
        ],
    ]) ?>
	
    <p>
        <?= Html::a('<i class="fa fa-pencil"></i>&nbsp;&nbsp; Ubah', ['update', 'ID' => $model->ID, 'KD_TYPE' => $model->KD_TYPE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i>&nbsp;&nbsp; Hapus', ['delete', 'ID' => $model->ID, 'KD_TYPE' => $model->KD_TYPE], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
