<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Suplier */

$this->title = 'Update Suplier: ' . ' ' . $model->NM_SUPPLIER;
$this->params['breadcrumbs'][] = ['label' => 'Suplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
