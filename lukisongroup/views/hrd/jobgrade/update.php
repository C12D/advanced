<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Jobgrade */

$this->title = 'Update Jobgrade: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jobgrades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobgrade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
