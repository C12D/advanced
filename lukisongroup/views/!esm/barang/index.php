<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\esm\Barang;

$this->sideMenu = 'esm prodak';
$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'PT. Efenbi Sukses Makmur';       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_barang';                     /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'ESN - Barang ');      /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/
?>


<div class="barang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	
	<?php  
		print_r($querys); 
		echo $querys[0]['HARGA'];
		
	?>
	

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'KD_BARANG',
			[
				'attribute' => 'Nama Prodak',
				'value' => 'brg.NM_BARANG',
			],
//            'NM_BARANG',
			[
				'attribute' => 'Nama DIstributor',
				'value' => 'dbtr.NM_DISTRIBUTOR',
			],
			[
				'attribute' => 'STATUS Barang',
				'value' => 'unitb.NM_UNIT',
			],
		
            // 'HPP',
            // 'HARGA',
            // 'NOTE',
            // 'STATUS',
            // 'createdBy',
            // 'createdAt',
            // 'updateAt',
            // 'DATA_ALL',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
