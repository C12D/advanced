<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\Suplier */

$this->title = $model->NM_SUPPLIER;
$this->params['breadcrumbs'][] = ['label' => 'Suplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="suplier-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div>

<?php 
	$stt = $model->STATUS;
	if($stt = 1){
		$stat = 'Aktif';
	} else {
		$stat = 'Tidak Aktif';
	}
?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//			'ID',
			'KD_SUPPLIER',
			'NM_SUPPLIER',
			'ALAMAT:ntext',
			'KOTA',
			'TLP',
			'MOBILE',
			'FAX',
			'EMAIL:email',
			'WEBSITE',
//			'IMAGE',
			[
				'attribute' => 'Group Perusahaan',
				'value'=>  $model->perusahaan->NM_CORP
			],
			[
				'attribute' => 'STATUS',
				'value'=>$stat
			],
//			'NOTE:ntext',
//			'KD_CAB',
//			'KD_DEP',
//			'CREATED_BY',
//			'CREATED_AT',
//			'UPDATED_BY',
//			'UPDATED_AT',
//			'data_all:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i>&nbsp;&nbsp;Ubah', ['update', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i>&nbsp;&nbsp;Hapus', ['delete', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => 'Are you sure you want to delete this item?',
			    'method' => 'post',
			],
        ]) ?>
    </p>
</div>
