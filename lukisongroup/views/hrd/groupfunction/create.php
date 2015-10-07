<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Groupfunction */

$this->title = 'Create Groupfunction';
$this->params['breadcrumbs'][] = ['label' => 'Groupfunctions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupfunction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
