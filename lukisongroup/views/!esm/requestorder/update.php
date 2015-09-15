<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Requestorder */
$this->sideMenu = 'esm';
$this->title = 'Update Requestorder: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Requestorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requestorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
