<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Deptsub */

$this->title = 'Update Deptsub: ' . ' ' . $model->DEP_SUB_ID;
$this->params['breadcrumbs'][] = ['label' => 'Deptsubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DEP_SUB_ID, 'url' => ['view', 'id' => $model->DEP_SUB_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deptsub-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
