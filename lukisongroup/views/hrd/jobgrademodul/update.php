<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Jobgrademodul */

$this->title = 'Update Jobgrademodul: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jobgrademoduls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobgrademodul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
