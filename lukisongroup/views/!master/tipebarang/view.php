<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\master\Tipebarang */

$this->title = $model->NM_TYPE;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipebarang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'KD_TYPE' => $model->KD_TYPE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'KD_TYPE' => $model->KD_TYPE], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
//            'ID',
            'KD_TYPE',
            'NM_TYPE',
            'NOTE:ntext',
//            'CREATED_BY',
//            'CREATED_AT',
//            'UPDATED_BY',
//            'UPDATED_AT',
			[
				'label' => 'STATUS',
				'value' => $stat,
			],
        ],
    ]) ?>

</div>
