<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Groupseqmen */

$this->title = 'Create Groupseqmen';
$this->params['breadcrumbs'][] = ['label' => 'Groupseqmens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupseqmen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
