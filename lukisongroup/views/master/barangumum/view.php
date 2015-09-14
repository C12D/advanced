<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use lukisongroup\models\master\Barangumum;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\master\Barangumum */

$this->title = $model->NM_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang Umum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="barangumum-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div>


<?php
	$sts = $model->STATUS;
	if($sts == 1){
		$stat = 'Aktif';
	} else {
		$stat = 'Tidak Aktif';
	}
?>

	<?php if($model->IMAGE == null){ $gmbr = "df.jpg"; } else { $gmbr = $model->IMAGE; }  ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			'KD_BARANG',
			'NM_BARANG',
			[
				'label' => 'Type Barang',
				'value' => $model->type->NM_TYPE,
			],
			[
				'label' => 'Kategori',
				'value' => $model->kategori->NM_KATEGORI,
			],
			
			[
				'attribute'=>'photo',
				'value'=>Yii::$app->urlManager->baseUrl.'/upload/barangumum/'.$gmbr,
				'format' => ['image',['width'=>'150','height'=>'150']],
			],
			[
				'label' => 'Unit',
				'value' => $model->unit->NM_UNIT,
			],
			
			[
				'label' => 'Suplier',
				'value' => $model->suplier->NM_SUPPLIER,
			],
			
			'KD_DISTRIBUTOR',
			'PARENT',
			'HPP',
			'HARGA',
			'BARCODE',
			'NOTE:ntext',
			
			[
				'label' => 'Group Perusahaan',
				'value' => $model->perusahaan->NM_CORP,
			],
			
			[
				'label' => 'Status',
				'value' => $stat,
			],
        ],
    ]) ?>


    <p>
        <?= Html::a('<i class="fa fa-pencil"></i>&nbsp;&nbsp;Ubah', ['update', 'ID' => $model->ID, 'KD_BARANG' => $model->KD_BARANG], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i>&nbsp;&nbsp;Hapus', ['delete', 'ID' => $model->ID, 'KD_BARANG' => $model->KD_BARANG], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => 'Are you sure you want to delete this item?',
			    'method' => 'post',
			],
        ]) ?>
    </p>
</div>
