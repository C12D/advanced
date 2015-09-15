<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Rodetail */

$this->sideMenu = 'esm';
$this->title = 'Create Rodetail';
$this->params['breadcrumbs'][] = ['label' => 'Rodetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rodetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
