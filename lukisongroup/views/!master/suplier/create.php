<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esm\Suplier */

$this->title = 'Create Suplier';
$this->params['breadcrumbs'][] = ['label' => 'Suplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suplier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
