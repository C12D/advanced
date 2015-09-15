<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esm\Distributor */
$this->sideMenu = 'esm';
$this->title = 'Buat Distributor';
$this->params['breadcrumbs'][] = ['label' => 'Distributor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="distributor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
