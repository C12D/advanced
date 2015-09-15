<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Rodetail */
$this->sideMenu = 'esm';
$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Rodetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rodetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'KD_RO',
            'KD_BARANG',
            'NM_BARANG',
            'QTY',
            'NO_URUT',
            'NOTE:ntext',
            'STATUS',
            'CREATED_AT',
            'UPDATED_AT',
        ],
    ]) ?>

</div>
