<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\master\Barangumum;

/* @var $this yii\web\View */
/* @var $model app\models\master\Barangumum */

$this->title = $model->NM_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang Umum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barangumum-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'KD_BARANG' => $model->KD_BARANG], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'KD_BARANG' => $model->KD_BARANG], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => 'Are you sure you want to delete this item?',
			    'method' => 'post',
			],
        ]) ?>
    </p>

<?php
	$sts = $model->STATUS;
	if($sts == 1){
		$stat = 'Aktif';
	} else {
		$stat = 'Tidak Aktif';
	}
?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//	           'ID',
			'KD_BARANG',
			'NM_BARANG',
//			'KD_TYPE',
			[
				'label' => 'Type Barang',
				'value' => $model->type->NM_TYPE,
			],
			
//			'KD_KATEGORI',
			[
				'label' => 'Kategori',
				'value' => $model->kategori->NM_KATEGORI,
			],
			
//			'KD_UNIT',
			[
				'label' => 'Unit',
				'value' => $model->unit->NM_UNIT,
			],
			
//			'KD_SUPPLIER',
			[
				'label' => 'Suplier',
				'value' => $model->suplier->NM_SUPPLIER,
			],
			
			'KD_DISTRIBUTOR',
			'PARENT',
			'HPP',
			'HARGA',
			'BARCODE',
			'IMAGE',
			'NOTE:ntext',
			
//			'KD_CORP',
			[
				'label' => 'Group Perusahaan',
				'value' => $model->perusahaan->NM_CORP,
			],
			
//			'STATUS',
			[
				'label' => 'STATUS',
				'value' => $stat,
			],
			
//			'KD_CAB',
//			'KD_DEP',
			
			/*
			'STATUS',
			'CREATED_BY',
			'CREATED_AT',
			'UPDATED_BY',
			'UPDATED_AT',
			'data_all:ntext', */
        ],
    ]) ?>

</div>
