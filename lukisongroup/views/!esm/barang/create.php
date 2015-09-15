<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esm\Barang */

$this->sideMenu = 'esm';
$this->title = 'Input Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
