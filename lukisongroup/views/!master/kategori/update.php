<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\master\Kategori */

$this->title = 'Update Kategori: ' . ' ' . $model->NM_KATEGORI;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'KD_KATEGORI' => $model->KD_KATEGORI]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
