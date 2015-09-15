<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Barang */

$this->sideMenu = 'esm';
$this->title = 'Update Barang : ' . ' ' . $model->KD_BARANG;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
