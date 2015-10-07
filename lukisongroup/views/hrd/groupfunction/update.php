<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Groupfunction */

$this->title = 'Update Groupfunction: ' . ' ' . $model->GF_ID;
$this->params['breadcrumbs'][] = ['label' => 'Groupfunctions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->GF_ID, 'url' => ['view', 'id' => $model->GF_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="groupfunction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
