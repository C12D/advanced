<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Distributor */
$this->sideMenu = 'esm';
$this->title = 'Update Distributor: ' . ' ' . $model->ID_DISTRIBUTOR;
$this->params['breadcrumbs'][] = ['label' => 'Distributor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DISTRIBUTOR, 'url' => ['view', 'id' => $model->ID_DISTRIBUTOR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distributor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
