<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\master\Barangumum */

$this->title = 'Update Barang Umum : ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Barang Umum', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID, 'KD_BARANG' => $model->KD_BARANG]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barangumum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
