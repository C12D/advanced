<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\master\Tipebarang */

$this->title = 'Update Tipe Barang: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'KD_TYPE' => $model->KD_TYPE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipebarang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
