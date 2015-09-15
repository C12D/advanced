<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Suplier */

$this->title = $model->NM_SUPPLIER;
$this->params['breadcrumbs'][] = ['label' => 'Suplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suplier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => 'Are you sure you want to delete this item?',
			    'method' => 'post',
			],
        ]) ?>
    </p>
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

</div>
