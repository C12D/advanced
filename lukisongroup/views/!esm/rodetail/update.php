<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Rodetail */

$this->sideMenu = 'esm';
$this->title = 'Update Rodetail: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Rodetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rodetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
