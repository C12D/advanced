<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\master\Unitbarang */

$this->title = 'Update Unit Barang: ' . ' ' . $model->NM_UNIT;
$this->params['breadcrumbs'][] = ['label' => 'Unit Barang ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'KD_UNIT' => $model->KD_UNIT]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unitbarang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
