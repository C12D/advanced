<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Jobgrade */

$this->title = 'Create Jobgrade';
$this->params['breadcrumbs'][] = ['label' => 'Jobgrades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobgrade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
