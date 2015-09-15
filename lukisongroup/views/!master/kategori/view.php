<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\master\Kategori */

$this->title = $model->NM_KATEGORI;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'KD_KATEGORI' => $model->KD_KATEGORI], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'KD_KATEGORI' => $model->KD_KATEGORI], [
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
//			'ID',
			'KD_KATEGORI',
			'NM_KATEGORI',
			'NOTE:ntext',
//			'CREATED_BY',
//			'CREATED_AT',
//			'UPDATED_BY',
//			'UPDATED_AT',
			[
				'label' => 'STATUS',
				'value' => $stat,
			],
        ],
    ]) ?>

</div>
