<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use lukisongroup\models\esm\Barang;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\Barang */

$this->title = $model->KD_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'ESM Request Order';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_esm';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="barang-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div> 

<?php
	$sts = $model->STATUS;
	if($sts == 1){
		$stat = 'Aktif';
	} else {
		$stat = 'Tidak Aktif';
	}

	if($model->IMAGE == null){ $gmbr = "df.jpg"; } else { $gmbr = $model->IMAGE; } 
	?>
	
    <?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'KD_BARANG',
			'NM_BARANG',
			[
				'label' => 'Total Barang',
				'value' => $model->unitb->NM_UNIT,
			],
			[
				'label' => 'Nama Distributor',
				'value' => $model->dbtr->NM_DISTRIBUTOR,
			],
			[
				'attribute'=>'Gambar',
				'value'=>Yii::$app->urlManager->baseUrl.'/upload/barangesm/'.$gmbr,
				'format' => ['image',['width'=>'150','height'=>'150']],
			],	
			'HPP',
			'HARGA',
			'BARCODE',
			'NOTE',
			[
				'label' => 'Status',
				'value' => $stat,
			],
        ],
    ]) ?>


    <p>
        <?= Html::a('<i class="fa fa-pencil"></i>&nbsp;&nbsp;Ubah', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i>&nbsp;&nbsp;Hapus', ['delete', 'id' => $model->ID], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => 'Are you sure you want to delete this item?',
			    'method' => 'post',
			],
        ]) ?>
    </p>
</div>
