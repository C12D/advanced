<?php
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\master\TipebarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipe Barang';
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'Lukison Group';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'datamaster';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>


<div class="tipebarang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?php 
		$gridColumns = [
			['class' => 'yii\grid\SerialColumn'],

			'NM_TYPE',
			'NOTE:ntext',
				[
					'attribute' => 'STATUS',
					'value' => function ($model) {
						return $model->STATUS == 1 ? 'Aktif' : 'Tidak Aktif';
					},
				],

			['class' => 'yii\grid\ActionColumn'],
		];

	echo Yii::$app->gv->grview($gridColumns,$dataProvider,$searchModel, 'Tipe Barang', 'tipe-barang',$this->title);
	
	?>

</div>
