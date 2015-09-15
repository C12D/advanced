<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\esm\Barang;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Barang */

$this->sideMenu = 'esm';
$this->title = $model->KD_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <!-- ?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?-->
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
			'KD_BARANG',
//			'NM_BARANG',
			[
				'label' => 'Nama Barang',
				'value' => $model->brg->NM_BARANG,
			],
			
			[
				'label' => 'Total Barang',
				'value' => $model->unitb->NM_UNIT,
			],
			
//			'KD_SUPPLIER',
			[
				'label' => 'Nama Distributor',
				'value' => $model->dbtr->NM_DISTRIBUTOR,
			],
//			'kdDbtr',
			'HPP',
			'HARGA',
			'BARCODE',
			'NOTE',
			[
				'label' => 'STATUS',
				'value' => $stat,
			],
			
//			'STATUS',
//			'createdBy',
//			'createdAt',
//			'updateAt',
//			'DATA_ALL',
        ],
    ]) ?>

</div>
