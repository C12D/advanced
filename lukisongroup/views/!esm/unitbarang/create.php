<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esm\Unitbarang */
$this->sideMenu = 'esm';
$this->title = 'Buat Unit Baru';
$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitbarang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
