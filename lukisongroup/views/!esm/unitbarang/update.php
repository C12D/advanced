<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Unitbarang */
$this->sideMenu = 'esm';
$this->title = 'Update Unit: ' . ' ' . $model->NM_UNIT;
$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unitbarang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
